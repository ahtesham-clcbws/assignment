<?php

namespace App\Http\Controllers;

use App\Models\Services;

class WebController extends Controller
{
    public function welcome()
    {
        $data = array();

        return view('welcome')->with($data);
    }

    public function getServices($location)
    {
        $data = array();

        $Services = Services::where('location', $location)->get();

        $data['services'] = $Services;
        $data['selectedLocation'] = $location;

        return view('services')->with($data);
    }
}
