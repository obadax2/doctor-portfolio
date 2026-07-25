<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Profile extends Model
{
    use HasTranslations;

    public $translatable = [
        'name',
        'title',
        'bio',
        'qualifications',
        'experience',
        'education',
        'credentials',
        'expertise',
        'expertise_tags',
        'stats',
    ];

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

}