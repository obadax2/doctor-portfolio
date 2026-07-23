<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Http\Resources\TestimonialResource;
use Illuminate\Http\Request;


class TestimonialController extends Controller
{

    public function index()
    {
        return TestimonialResource::collection(
            Testimonial::latest()->get()
        );
    }


    public function store(Request $request)
    {

        $data = $request->validate([

            'name' => 'required|string',

            'message' => 'required|string',

            'rating' => 'nullable|integer|min:1|max:5',

        ]);


        $testimonial = Testimonial::create($data);


        return new TestimonialResource($testimonial);

    }



    public function show(Testimonial $testimonial)
    {
        return new TestimonialResource($testimonial);
    }



    public function update(Request $request, Testimonial $testimonial)
    {

        $data = $request->validate([

            'name' => 'required|string',

            'message' => 'required|string',

            'rating' => 'nullable|integer|min:1|max:5',

        ]);


        $testimonial->update($data);


        return new TestimonialResource($testimonial);

    }



    public function destroy(Testimonial $testimonial)
    {

        $testimonial->delete();


        return response()->json([

            'message'=>'Testimonial deleted'

        ]);

    }

}