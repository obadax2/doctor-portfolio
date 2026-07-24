<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'bio' => $this->bio,
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'qualifications' => $this->qualifications,
            'experience' => $this->experience,
            'education' => $this->education ?? [],
            'credentials' => $this->credentials ?? [],
            'expertise' => $this->expertise ?? [],
            'expertise_tags' => $this->expertise_tags ?? [],
            'stats' => $this->stats ?? [],
            'email' => $this->email,
            'phone' => $this->phone,
        ];
    }
}