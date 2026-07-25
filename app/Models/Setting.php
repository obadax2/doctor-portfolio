<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    use HasTranslations;

    public $translatable = [
        'clinic_name',
        'tagline',
        'description',
        'address',
        'stats',
        'hours',
        'features',
        'about_story',
        'about_mission',
        'about_vision',
        'about_values',
        'hero_title',
        'hero_subtitle',
        'page_content',
    ];

    protected $fillable = [
        'phone',
        'email',
        'address',
        'whatsapp',
        'facebook',
        'instagram',
        'clinic_name',
        'tagline',
        'description',
        'emergency',
        'stats',
        'hours',
        'features',
        'about_story',
        'about_established',
        'about_mission',
        'about_vision',
        'about_values',
        'hero_title',
        'hero_subtitle',
        'clinic_image',
        'hero_image',
        'patient_images',
        'page_content',
    ];

    protected function casts(): array
    {
        return [
            'patient_images' => 'array',
        ];
    }
}