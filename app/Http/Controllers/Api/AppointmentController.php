<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'reason' => 'nullable|string',
            'type' => 'nullable|string|in:in-clinic,online',
        ]);

        $appointment = Appointment::create($data);

        return response()->json([
            'message' => 'Appointment request submitted successfully',
            'appointment' => $appointment,
        ], 201);
    }

}