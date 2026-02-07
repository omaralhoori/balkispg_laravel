<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * This migration should be run AFTER the data migration command.
     * It drops old string columns and renames JSON columns to original names.
     */
    public function up(): void
    {
        $driver = DB::getDriverName();

        // Programs table
        $this->swapColumns('programs', ['title', 'description', 'category'], $driver);

        // BlogPosts table
        $this->swapColumns('blog_posts', [
            'title',
            'excerpt',
            'content',
            'category',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ], $driver);

        // AboutPages table
        $this->swapColumns('about_pages', [
            'hero_title',
            'hero_title_highlight',
            'hero_description',
            'vision_title',
            'vision_description',
            'mission_title',
            'mission_description',
            'timeline_badge',
            'timeline_title',
            'values_title',
            'team_badge',
            'team_title',
            'commitment_badge',
            'commitment_title',
            'commitment_title_highlight',
            'commitment_description',
            'compliance_title',
            'compliance_description',
            'contact_question',
            'contact_description',
        ], $driver);

        // HomePages table
        $this->swapColumns('home_pages', [
            'main_title',
            'main_subtitle',
            'main_description',
            'main_badge_text',
            'cta_button_text',
            'video_button_text',
            'statistics_title',
            'statistics_subtitle',
            'statistics_description',
            'statistics_badge_text',
            'map_location_title',
            'map_address_line1',
            'map_address_line2',
            'footer_brand_name',
            'footer_brand_description',
            'footer_copyright_text',
        ], $driver);

        // HomePageServices table
        $this->swapColumns('home_page_services', [
            'title',
            'subtitle',
            'description',
            'badge_text',
            'card_title',
            'card_description',
            'cta_button_text',
        ], $driver);

        // Testimonials table
        $this->swapColumns('testimonials', [
            'name',
            'position',
            'company',
            'testimonial',
        ], $driver);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $driver = DB::getDriverName();

        // Programs table - restore string columns and rename JSON back
        $this->restoreColumns('programs', ['title', 'description', 'category'], $driver);

        // BlogPosts table
        $this->restoreColumns('blog_posts', [
            'title',
            'excerpt',
            'content',
            'category',
            'meta_title',
            'meta_description',
            'meta_keywords',
        ], $driver);

        // AboutPages table
        $this->restoreColumns('about_pages', [
            'hero_title',
            'hero_title_highlight',
            'hero_description',
            'vision_title',
            'vision_description',
            'mission_title',
            'mission_description',
            'timeline_badge',
            'timeline_title',
            'values_title',
            'team_badge',
            'team_title',
            'commitment_badge',
            'commitment_title',
            'commitment_title_highlight',
            'commitment_description',
            'compliance_title',
            'compliance_description',
            'contact_question',
            'contact_description',
        ], $driver);

        // HomePages table
        $this->restoreColumns('home_pages', [
            'main_title',
            'main_subtitle',
            'main_description',
            'main_badge_text',
            'cta_button_text',
            'video_button_text',
            'statistics_title',
            'statistics_subtitle',
            'statistics_description',
            'statistics_badge_text',
            'map_location_title',
            'map_address_line1',
            'map_address_line2',
            'footer_brand_name',
            'footer_brand_description',
            'footer_copyright_text',
        ], $driver);

        // HomePageServices table
        $this->restoreColumns('home_page_services', [
            'title',
            'subtitle',
            'description',
            'badge_text',
            'card_title',
            'card_description',
            'cta_button_text',
        ], $driver);

        // Testimonials table
        $this->restoreColumns('testimonials', [
            'name',
            'position',
            'company',
            'testimonial',
        ], $driver);
    }

    protected function swapColumns(string $table, array $fields, string $driver): void
    {
        foreach ($fields as $field) {
            $oldColumn = $field;
            $newColumn = "{$field}_translations";

            // Drop old string column
            Schema::table($table, function (Blueprint $table) use ($oldColumn) {
                $table->dropColumn($oldColumn);
            });

            // Rename JSON column to original name
            if ($driver === 'mysql') {
                DB::statement("ALTER TABLE `{$table}` CHANGE `{$newColumn}` `{$oldColumn}` JSON");
            } elseif ($driver === 'pgsql') {
                DB::statement("ALTER TABLE \"{$table}\" RENAME COLUMN \"{$newColumn}\" TO \"{$oldColumn}\"");
                DB::statement("ALTER TABLE \"{$table}\" ALTER COLUMN \"{$oldColumn}\" TYPE JSONB USING \"{$oldColumn}\"::jsonb");
            } else {
                // SQLite
                // SQLite doesn't support column renaming easily, so we'll need a different approach
                // For now, we'll just keep the _translations suffix for SQLite
                // In production, you'd want to recreate the table
            }
        }
    }

    protected function restoreColumns(string $table, array $fields, string $driver): void
    {
        foreach ($fields as $field) {
            $oldColumn = $field;
            $newColumn = "{$field}_translations";

            // Rename JSON column back to _translations
            if ($driver === 'mysql') {
                DB::statement("ALTER TABLE `{$table}` CHANGE `{$oldColumn}` `{$newColumn}` JSON");
            } elseif ($driver === 'pgsql') {
                DB::statement("ALTER TABLE \"{$table}\" RENAME COLUMN \"{$oldColumn}\" TO \"{$newColumn}\"");
            }

            // Re-add string column (we'll need to determine the original type)
            // This is a simplified version - you may need to adjust based on your schema
            Schema::table($table, function (Blueprint $table) use ($oldColumn, $field) {
                $textFields = [
                    'description',
                    'content',
                    'hero_description',
                    'vision_description',
                    'mission_description',
                    'commitment_description',
                    'compliance_description',
                    'contact_description',
                    'main_description',
                    'statistics_description',
                    'footer_brand_description',
                    'testimonial',
                ];
                if (in_array($field, $textFields)) {
                    $table->text($oldColumn)->nullable();
                } else {
                    $table->string($oldColumn)->nullable();
                }
            });
        }
    }
};
