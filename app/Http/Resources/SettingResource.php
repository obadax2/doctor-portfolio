<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
{
    use Traits\NormalizesArrays;

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'clinic_name' => $this->clinic_name,
            'tagline' => $this->tagline,
            'description' => $this->description,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'emergency' => $this->emergency,
            'whatsapp' => $this->whatsapp,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'stats' => $this->stats ?? [],
            'hours' => $this->hours ?? [],
            'features' => $this->normalizeSimple($this->features, 'feature'),
            'about_story' => $this->normalizeSimple($this->about_story, 'paragraph'),
            'about_established' => $this->about_established,
            'about_mission' => $this->about_mission,
            'about_vision' => $this->about_vision,
            'about_values' => $this->about_values,
            'hero_title' => $this->hero_title,
            'hero_subtitle' => $this->hero_subtitle,
            'clinic_image' => $this->clinic_image ? asset('storage/' . $this->clinic_image) : null,
            'hero_image' => $this->hero_image ? asset('storage/' . $this->hero_image) : null,
            'patient_images' => $this->patient_images ?? [],
        ];
    }
}