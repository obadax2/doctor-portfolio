<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->title,
            'description' => $this->description,
            'long_description' => $this->long_description,
            'icon' => $this->icon ?? 'medical_services',
            'category' => $this->category ?? 'Treatment',
            'highlights' => $this->normalizeSimple($this->highlights, 'highlight'),
            'image' => $this->image ? asset('storage/' . $this->image) : null,
            'is_active' => $this->is_active,
            'sort_order' => $this->sort_order,
        ];
    }

    /** Normalize Filament Repeater format → flat string array */
    private function normalizeSimple(?array $data, string $key): array
    {
        if (empty($data)) return [];
        $first = $data[array_key_first($data)] ?? null;
        if (is_string($first)) return $data;
        return array_values(array_map(
            fn($item) => $item[$key] ?? $item[0] ?? (string) $item,
            $data
        ));
    }
}