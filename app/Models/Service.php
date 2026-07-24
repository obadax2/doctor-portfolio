<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'long_description',
        'icon',
        'category',
        'highlights',
        'image',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'highlights' => 'array',
            'is_active' => 'boolean',
        ];
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $service) {
            if (empty($service->slug)) {
                $service->slug = static::generateUniqueSlug($service->title);
            }
        });

        static::updating(function (self $service) {
            if ($service->isDirty('title') && !$service->isDirty('slug')) {
                $service->slug = static::generateUniqueSlug($service->title, $service->id);
            }
        });
    }

    public static function generateUniqueSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title);
        $slug = $base;
        $i = 1;
        while (static::where('slug', $slug)->where('id', '!=', $ignoreId)->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}