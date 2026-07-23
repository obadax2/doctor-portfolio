<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Http\Resources\TestimonialResource;


class TestimonialController extends Controller
{

    public function index()
    {
        return TestimonialResource::collection(
            Testimonial::latest()->get()
        );
    }

}