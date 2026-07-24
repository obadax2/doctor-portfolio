<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'subject' => 'nullable|string',
            'message' => 'required|string',
        ]);

        $contact = ContactMessage::create($data);

        return response()->json([
            'message' => 'Message sent successfully',
        ], 201);
    }

}