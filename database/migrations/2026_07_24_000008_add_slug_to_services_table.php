<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
        });

        DB::table('services')->get()->each(function ($service) {
            $base = Str::slug($service->title);
            $slug = $base;
            $i = 1;
            while (DB::table('services')->where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
                $slug = $base . '-' . $i++;
            }
            DB::table('services')->where('id', $service->id)->update(['slug' => $slug]);
        });

        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->unique()->change();
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};