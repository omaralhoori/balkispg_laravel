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
            $table->string('tourism_api_url')->nullable()->after('cta_button_url');
            $table->json('tourism_section_title')->nullable()->after('tourism_api_url');
        });
    }

    public function down(): void
    {
        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn(['tourism_api_url', 'tourism_section_title']);
        });
    }
};
