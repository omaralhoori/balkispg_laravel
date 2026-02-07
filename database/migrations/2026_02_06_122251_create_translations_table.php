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
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->morphs('translatable'); // translatable_type, translatable_id
            $table->string('locale', 10); // ar, en, tr
            $table->string('field'); // اسم الحقل المراد ترجمته
            $table->text('value')->nullable(); // القيمة المترجمة
            $table->timestamps();

            // فهرس فريد لمنع التكرار
            $table->unique(['translatable_type', 'translatable_id', 'locale', 'field'], 'translation_unique');

            // فهرس للبحث السريع
            $table->index(['translatable_type', 'translatable_id', 'locale']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};
