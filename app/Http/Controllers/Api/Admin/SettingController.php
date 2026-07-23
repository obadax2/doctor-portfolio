<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Http\Resources\SettingResource;
use Illuminate\Http\Request;


class SettingController extends Controller
{

    public function update(Request $request)
    {

        $data = $request->validate([

            'phone'=>'nullable|string',

            'email'=>'nullable|email',

            'address'=>'nullable|string',

            'whatsapp'=>'nullable|string',

            'facebook'=>'nullable|string',

            'instagram'=>'nullable|string',

        ]);


        $setting = Setting::first();


        if(!$setting)
        {
            $setting = Setting::create($data);
        }
        else
        {
            $setting->update($data);
        }


        return new SettingResource($setting);

    }

}