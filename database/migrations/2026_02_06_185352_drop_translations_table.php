<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * This migration should be run AFTER:
     * 1. Data migration command (migrate:translations)
     * 2. Column swap migration (swap_translatable_columns_to_json)
     */
    public function up(): void
    {
        Schema::dropIfExists('translations');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->morphs('translatable');
            $table->string('locale', 10);
            $table->string('field');
            $table->text('value')->nullable();
            $table->timestamps();

            $table->unique(['translatable_type', 'translatable_id', 'locale', 'field'], 'translation_unique');
            $table->index(['translatable_type', 'translatable_id', 'locale']);
        });
    }
};
