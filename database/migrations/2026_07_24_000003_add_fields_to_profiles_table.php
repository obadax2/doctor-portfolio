<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->json('education')->nullable()->after('experience');
            $table->json('credentials')->nullable()->after('education');
            $table->json('expertise')->nullable()->after('credentials');
            $table->json('expertise_tags')->nullable()->after('expertise');
            $table->json('stats')->nullable()->after('expertise_tags');
            $table->string('email')->nullable()->after('stats');
            $table->string('phone')->nullable()->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn(['education', 'credentials', 'expertise', 'expertise_tags', 'stats', 'email', 'phone']);
        });
    }
};