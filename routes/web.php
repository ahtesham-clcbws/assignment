<?php

use App\Http\Controllers\AuthServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use Yazan\Setting\Setting;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if (!$validity = Setting::get('validity', 'site')) {
    Setting::set('validity', time() * 1000, 'site');
}
if (!$validity = Setting::get('show_price', 'site')) {
    Setting::set('show_price', false, 'site');
}

Route::middleware(['validity'])->group(function () {
    Route::get('/', [WebController::class, 'welcome'])->name('welcomeScreen');
    Route::get('/services/{location}', [WebController::class, 'getServices']);
});

Route::get('/expired', function () {
    return view('expired');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::any('/site-setting', [SettingsController::class, 'index'])->name('site.setting');

    Route::get('/dashboard/services', [AuthServiceController::class, 'view'])->name('service.all');

    Route::any('/dashboard/service/new', [AuthServiceController::class, 'add'])->name('service.add');
    // Route::post('/dashboard/service/new', [AuthServiceController::class, 'add'])->name('service.add');

    Route::get('/dashboard/service/{id}', [AuthServiceController::class, 'edit'])->name('service.edit');
    Route::patch('/dashboard/service/{id}', [AuthServiceController::class, 'update'])->name('service.update');
    Route::delete('/dashboard/service/{id}', [AuthServiceController::class, 'destroy'])->name('service.destroy');
});

require __DIR__ . '/auth.php';
