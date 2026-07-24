<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{

    public function index()
    {
        return ServiceResource::collection(
            Service::where('is_active', true)->orderBy('sort_order')->get()
        );
    }

    public function show(Service $service)
    {
        return new ServiceResource($service);
    }

}