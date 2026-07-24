<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'image' => asset('storage/' . $this->image),
            'caption' => $this->caption,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];
    }
}