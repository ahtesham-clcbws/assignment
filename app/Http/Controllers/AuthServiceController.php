<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AuthServiceController extends Controller
{
    /**
     * Display the services view.
     */
    public function view(): View
    {
        $data = array();

        $Services = Services::orderBy('id', 'desc')->get();

        $data['services'] = $Services;

        return view('dashboard.services.viewall')->with($data);
    }
    /**
     * Display the service add form.
     */
    public function add(Request $request)
    {

        if ($request->getMethod() == 'POST') {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = $image->getClientOriginalName();
                $image->move(public_path() . '/service_image/', $imageName);
                $data = [
                    'image' => '/service_image/' . $imageName,
                    'name' => $request->input('name'),
                    'location' => $request->input('location'),
                    'description' => $request->input('description'),
                    'price' => $request->input('price')
                ];

                $serviceModel = new Services();
                $serviceModel->image = '/service_image/' . $imageName;
                $serviceModel->name = $request->input('name');
                $serviceModel->location = $request->input('location');
                $serviceModel->description = $request->input('description');
                $serviceModel->price = $request->input('price');
                $serviceModel->save();

                return redirect()->route('service.all');
            } else {
                return back()->withErrors(['Image file not found.']);
            }
        }

        $data = array();
        $data['locations'] = getLocations();
        return view('dashboard.services.add')->with($data);
    }
    /**
     * Display the service edit form.
     */
    public function edit(Request $request): View
    {
        return view('dashboard.services.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the service information.
     */
    public function update(Request $request)
    {
        $request->services()->fill($request->validated());

        $request->services()->save();

        return redirect()->to('service.all');
        // return Redirect::route('dashboard.services.edit')->with('status', 'service-updated');
    }

    /**
     * Delete the service account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
