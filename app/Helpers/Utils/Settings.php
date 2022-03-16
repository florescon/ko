<?php

use App\Models\Setting;
use App\Helpers\Utils\NullSetting;
use Illuminate\Support\Facades\Cache;

function setting($key)
{
    $setting = Cache::rememberForever('setting', function () {
        return Setting::first() ?? NullSetting::make();
    });

    if ($setting) {
        return $setting->{$key};
    }
}
