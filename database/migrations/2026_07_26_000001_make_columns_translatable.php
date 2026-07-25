<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $tables = [];

    public function __construct()
    {
        $this->tables = [
            'services' => [
                'columns' => ['title', 'description', 'long_description', 'category', 'highlights'],
                'json_columns' => ['highlights'],
            ],
            'profiles' => [
                'columns' => ['name', 'title', 'bio', 'qualifications', 'experience', 'education', 'credentials', 'expertise', 'expertise_tags', 'stats'],
                'json_columns' => ['education', 'credentials', 'expertise', 'expertise_tags', 'stats'],
            ],
            'testimonials' => [
                'columns' => ['name', 'message'],
                'json_columns' => [],
            ],
            'galleries' => [
                'columns' => ['caption'],
                'json_columns' => [],
            ],
            'settings' => [
                'columns' => ['clinic_name', 'tagline', 'description', 'address', 'stats', 'hours', 'features', 'about_story', 'about_mission', 'about_vision', 'about_values', 'hero_title', 'hero_subtitle', 'page_content'],
                'json_columns' => ['stats', 'hours', 'features', 'about_story', 'about_mission', 'about_vision', 'about_values', 'page_content'],
            ],
        ];
    }

    public function up(): void
    {
        // First, wrap existing data in {"en": "..."} for each translatable column
        foreach ($this->tables as $table => $config) {
            $rows = DB::table($table)->get();
            foreach ($rows as $row) {
                $updates = [];
                foreach ($config['columns'] as $column) {
                    $value = $row->{$column};
                    if ($value === null) {
                        // JSON null — store as null
                        $updates[$column] = json_encode(['en' => null]);
                    } elseif (in_array($column, $config['json_columns'])) {
                        // Already JSON — decode then wrap
                        $decoded = is_string($value) ? json_decode($value, true) : $value;
                        if (is_array($decoded)) {
                            $updates[$column] = json_encode(['en' => $decoded]);
                        } else {
                            $updates[$column] = json_encode(['en' => $value]);
                        }
                    } else {
                        // Plain string — wrap in {"en": "..."}
                        $updates[$column] = json_encode(['en' => $value]);
                    }
                }
                if (!empty($updates)) {
                    DB::table($table)->where('id', $row->id)->update($updates);
                }
            }
        }

        // Now alter columns to JSON type
        Schema::table('services', function (Blueprint $table) {
            $table->json('title')->change();
            $table->json('description')->change();
            $table->json('long_description')->change();
            $table->json('category')->change();
            $table->json('highlights')->change();
            // slug stays string — NOT translatable
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->json('name')->change();
            $table->json('title')->change();
            $table->json('bio')->change();
            $table->json('qualifications')->change();
            $table->json('experience')->change();
            $table->json('education')->change();
            $table->json('credentials')->change();
            $table->json('expertise')->change();
            $table->json('expertise_tags')->change();
            $table->json('stats')->change();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->json('name')->change();
            $table->json('message')->change();
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->json('caption')->change();
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->json('clinic_name')->change();
            $table->json('tagline')->change();
            $table->json('description')->change();
            $table->json('address')->change();
            $table->json('stats')->change();
            $table->json('hours')->change();
            $table->json('features')->change();
            $table->json('about_story')->change();
            $table->json('about_mission')->change();
            $table->json('about_vision')->change();
            $table->json('about_values')->change();
            $table->json('hero_title')->change();
            $table->json('hero_subtitle')->change();
            $table->json('page_content')->change();
        });
    }

    public function down(): void
    {
        // Revert columns back to original types
        Schema::table('services', function (Blueprint $table) {
            $table->string('title')->change();
            $table->text('description')->change();
            $table->text('long_description')->change();
            $table->string('category')->change();
            $table->json('highlights')->change();
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->string('name')->change();
            $table->string('title')->change();
            $table->text('bio')->change();
            $table->text('qualifications')->change();
            $table->text('experience')->change();
            $table->json('education')->change();
            $table->json('credentials')->change();
            $table->json('expertise')->change();
            $table->json('expertise_tags')->change();
            $table->json('stats')->change();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('name')->change();
            $table->text('message')->change();
        });

        Schema::table('galleries', function (Blueprint $table) {
            $table->string('caption')->change();
        });

        Schema::table('settings', function (Blueprint $table) {
            $table->string('clinic_name')->change();
            $table->string('tagline')->change();
            $table->text('description')->change();
            $table->text('address')->change();
            $table->json('stats')->change();
            $table->json('hours')->change();
            $table->json('features')->change();
            $table->json('about_story')->change();
            $table->json('about_mission')->change();
            $table->json('about_vision')->change();
            $table->json('about_values')->change();
            $table->string('hero_title')->change();
            $table->string('hero_subtitle')->change();
            $table->json('page_content')->change();
        });
    }
};
