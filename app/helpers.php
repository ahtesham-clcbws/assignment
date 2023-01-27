<?php

use Yazan\Setting\Setting;

if (!function_exists('getLocations')) {
    function getLocations()
    {
        return ['Kolkata', 'Delhi', 'Mumbai'];
    }
}
if (!function_exists('getSiteValidity')) {
    function getSiteValidity()
    {
        $siteValidity = intval(Setting::get('validity', 'site'));
        $currentTime = time() * 1000;
        if ($currentTime < $siteValidity) {
            return true;
        }
        return false;
    }
}

if (!function_exists('getSitePriceVisibility')) {
    function getSitePriceVisibility()
    {
        $show_price = intval(Setting::get('show_price', 'site'));
        if ($show_price) {
            return true;
        }
        return false;
    }
}
