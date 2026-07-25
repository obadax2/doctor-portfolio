<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class Service extends Model
{
    use HasTranslations;

    public $translatable = [
        'title',
        'description',
        'long_description',
        'category',
        'highlights',
    ];

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
            'is_active' => 'boolean',
        ];
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (self $service) {
            if (empty($service->slug)) {
                // Always generate slug from the English title — avoids mutating global locale
                $englishTitle = $service->getTranslation('title', 'en') ?? '';
                $service->slug = static::generateUniqueSlug($englishTitle);
            }
        });

        static::updating(function (self $service) {
            if ($service->isDirty('title') && !$service->isDirty('slug')) {
                // Always generate slug from the English title — avoids mutating global locale
                $englishTitle = $service->getTranslation('title', 'en') ?? '';
                $service->slug = static::generateUniqueSlug($englishTitle, $service->id);
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