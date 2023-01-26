<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\View\View;
use Yazan\Setting\Setting;

class WebController extends Controller
{
    public function welcome()
    {
        $data = array();

        // return print_r($Services);

        // if(!getSiteValidity()) {
        // }

        return view('welcome')->with($data);
    }

    public function getServices($location)
    {
        $data = array();

        $Services = Services::where('location', $location)->get();

        $data['Services'] = $Services;

        return print_r($Services);

        return view('welcome')->with($data);
    }

    // public function expired()
    // {
    //     if (getSiteValidity()) {
    //         return redirect('/');
    //     }
    //     return view('expired');
    // }
}
