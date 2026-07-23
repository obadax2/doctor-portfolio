<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Resources\ProfileResource;


class ProfileController extends Controller
{

    public function show()
    {
        return new ProfileResource(
            Profile::first()
        );
    }


    public function update()
    {
        //
    }

}