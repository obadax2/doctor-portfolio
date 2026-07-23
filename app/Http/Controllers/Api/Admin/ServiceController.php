<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Http\Resources\ServiceResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{

    public function index()
    {
        return ServiceResource::collection(
            Service::latest()->get()
        );
    }


    public function store(Request $request)
    {

        $data = $request->validate([

            'title'=>'required|string',

            'description'=>'nullable|string',

            'image'=>'nullable|image|max:2048',

        ]);


        if($request->hasFile('image'))
        {
            $data['image'] =
                $request->file('image')
                ->store('services','public');
        }


        $service = Service::create($data);


        return new ServiceResource($service);

    }



    public function show(Service $service)
    {
        return new ServiceResource($service);
    }



    public function update(Request $request, Service $service)
    {

        $data = $request->validate([

            'title'=>'required|string',

            'description'=>'nullable|string',

            'image'=>'nullable|image|max:2048',

        ]);

if($request->hasFile('image'))
{

    if($service->image)
    {
        Storage::disk('public')->delete($service->image);
    }


    $data['image'] =
        $request->file('image')
        ->store('services','public');

}

        $service->update($data);


        return new ServiceResource($service);

    }


public function destroy(Service $service)
{

    if($service->image)
    {
        Storage::disk('public')->delete($service->image);
    }


    $service->delete();


    return response()->json([
        'message'=>'Service deleted'
    ]);

}

}