<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'title',
        'bio',
        'image',
        'qualifications',
        'experience',
        'education',
        'credentials',
        'expertise',
        'expertise_tags',
        'stats',
        'email',
        'phone',
    ];

    protected function casts(): array
    {
        return [
            'education' => 'array',
            'credentials' => 'array',
            'expertise' => 'array',
            'expertise_tags' => 'array',
            'stats' => 'array',
        ];
    }
}