<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('icon')->default('medical_services')->after('id');
            $table->string('category')->default('Treatment')->after('icon');
            $table->text('long_description')->nullable()->after('description');
            $table->json('highlights')->nullable()->after('long_description');
            $table->boolean('is_active')->default(true)->after('highlights');
            $table->integer('sort_order')->default(0)->after('is_active');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['icon', 'category', 'long_description', 'highlights', 'is_active', 'sort_order']);
        });
    }
};