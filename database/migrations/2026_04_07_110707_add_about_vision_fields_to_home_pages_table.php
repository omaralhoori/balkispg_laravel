<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->json('about_title')->nullable()->after('main_background_image');
            $table->json('about_description')->nullable()->after('about_title');
            $table->string('about_image')->nullable()->after('about_description');
            
            $table->json('vision_title')->nullable()->after('about_image');
            $table->json('vision_description')->nullable()->after('vision_title');
            $table->string('vision_icon')->nullable()->after('vision_description');
            
            $table->json('mission_title')->nullable()->after('vision_icon');
            $table->json('mission_description')->nullable()->after('mission_title');
            $table->string('mission_icon')->nullable()->after('mission_description');
        });
    }

    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn([
                'about_title', 'about_description', 'about_image',
                'vision_title', 'vision_description', 'vision_icon',
                'mission_title', 'mission_description', 'mission_icon',
            ]);
        });
    }
};
