<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yazan\Setting\Setting;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            // return print_r($request->input());
            $saveQueries = false;
            if ($request->input('validity')) {
                // Setting::set('validity', time() * 1000, 'site');
                // 1682500639000
                $validity = strtotime($request->input('validity')) * 1000;
                $siteValidity = Setting::set('validity', $validity, 'site');
                if($siteValidity){
                    $saveQueries = true;
                }
            }
            if ($request->input('show_price')) {
                // Setting::set('show_price', false, 'site');
                $show_price = $request->input('show_price') == 'Yes' ? true : false;
                $showPrice = Setting::set('show_price', $show_price, 'site');
                if($showPrice){
                    $saveQueries = true;
                }
            }
            if ($saveQueries) {
                return redirect()->back()->with('site-error', 'Unable to save data');
            } else {
                return redirect()->route('site.setting')->with('site-success', 'Successfully updated site data');
            }
        }
        $data = array();

        $siteSetting = Setting::group('site');

        $data['siteSetting'] = $siteSetting;

        return view('dashboard.site-setting')->with($data);
    }
}
