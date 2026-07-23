<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Resources\SettingResource;


class SettingController extends Controller
{

    public function show()
    {
        return new SettingResource(
            Setting::first()
        );
    }

}