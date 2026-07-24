<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('clinic_name')->nullable()->after('id');
            $table->string('tagline')->nullable()->after('clinic_name');
            $table->text('description')->nullable()->after('tagline');
            $table->string('emergency')->nullable()->after('whatsapp');
            $table->json('stats')->nullable()->after('emergency');
            $table->json('hours')->nullable()->after('stats');
            $table->json('features')->nullable()->after('hours');
            $table->json('about_story')->nullable()->after('features');
            $table->integer('about_established')->nullable()->after('about_story');
            $table->json('about_mission')->nullable()->after('about_established');
            $table->json('about_vision')->nullable()->after('about_mission');
            $table->json('about_values')->nullable()->after('about_vision');
            $table->string('hero_title')->nullable()->after('about_values');
            $table->string('hero_subtitle')->nullable()->after('hero_title');
            $table->string('clinic_image')->nullable()->after('hero_subtitle');
            $table->string('hero_image')->nullable()->after('clinic_image');
            $table->json('patient_images')->nullable()->after('hero_image');
        });
    }

    public function down(): void
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn([
                'clinic_name', 'tagline', 'description', 'emergency',
                'stats', 'hours', 'features', 'about_story', 'about_established',
                'about_mission', 'about_vision', 'about_values',
                'hero_title', 'hero_subtitle', 'clinic_image', 'hero_image', 'patient_images',
            ]);
        });
    }
};