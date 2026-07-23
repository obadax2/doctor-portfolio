<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
class ProfileController extends Controller
{

    public function update(Request $request)
    {

        $data = $request->validate([

            'name'=>'required|string',

            'title'=>'nullable|string',

            'bio'=>'nullable|string',

            'qualifications'=>'nullable|string',

            'experience'=>'nullable|string',

            'image'=>'nullable|image|max:2048',

        ]);


        $profile = Profile::first();

if($request->hasFile('image'))
{

    if($profile && $profile->image)
    {
        Storage::disk('public')->delete($profile->image);
    }


    $data['image'] =
        $request->file('image')
        ->store('profile','public');

}


        if(!$profile)
        {
            $profile = Profile::create($data);
        }
        else
        {
            $profile->update($data);
        }


        return new ProfileResource($profile);

    }

}