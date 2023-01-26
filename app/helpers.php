<?php

use Yazan\Setting\Setting;

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
