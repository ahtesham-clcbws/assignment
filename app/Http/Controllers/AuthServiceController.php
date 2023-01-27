<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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
    public function edit(Request $request)
    {
        // return print_r($request->id);

        $serviceModel = new Services();

        $service = $serviceModel->find($request->id);

        $data = array();
        $data['locations'] = getLocations();
        $data['service'] = $service;

        return view('dashboard.services.edit')->with($data);
    }

    /**
     * Update the service information.
     */
    public function update(Request $request)
    {
        $serviceModel = new Services();
        $service = $serviceModel->find($request->id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path() . '/service_image/', $imageName);
            $service->image = '/service_image/' . $imageName;
        }

        $service->name = $request->input('name');
        $service->location = $request->input('location');
        $service->description = $request->input('description');
        $service->price = $request->input('price');
        // $service->save();

        if ($service->save()) {
            return redirect()->route('service.all');
        } else {
            return back()->withErrors(['Image file not found.']);
        }

    }

    /**
     * Delete the service account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $serviceModel = new Services();
        $service = $serviceModel->find($request->id);
        $service->delete();

        return redirect()->route('service.all');
    }
}
