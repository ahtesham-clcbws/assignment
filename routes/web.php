<?php

use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WebController::class, 'welcome'])->name('welcomeScreen');

// Route::post('/get-services', [WebController::class, 'getServices']);
Route::get('/get-services/{location}', [WebController::class, 'getServices']);

// Route::get('/expired', function () {
//     return view('expired');
// });

Route::middleware(['validity'])->group(function () {

    Route::get('/', [WebController::class, 'welcome'])->name('welcomeScreen');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
