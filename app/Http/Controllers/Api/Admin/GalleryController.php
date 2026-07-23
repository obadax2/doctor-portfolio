<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Http\Resources\GalleryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{


public function index()
{
    return GalleryResource::collection(
        Gallery::latest()->get()
    );
}



public function store(Request $request)
{

    $data=$request->validate([

        'image'=>'required|image|max:2048',

        'caption'=>'nullable|string'

    ]);


    $data['image']=$request
        ->file('image')
        ->store('gallery','public');


    return new GalleryResource(
        Gallery::create($data)
    );

}


public function destroy(Gallery $gallery)
{

    if($gallery->image)
    {
        Storage::disk('public')->delete($gallery->image);
    }


    $gallery->delete();


    return response()->json([
        'message'=>'Deleted'
    ]);

}

}