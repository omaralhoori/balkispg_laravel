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
        // Programs table - translatable fields: title, description, category
        Schema::table('programs', function (Blueprint $table) {
            $table->json('title_translations')->nullable()->after('title');
            $table->json('description_translations')->nullable()->after('description');
            $table->json('category_translations')->nullable()->after('category');
        });

        // BlogPosts table - translatable fields: title, excerpt, content, category, meta_title, meta_description, meta_keywords
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->json('title_translations')->nullable()->after('title');
            $table->json('excerpt_translations')->nullable()->after('excerpt');
            $table->json('content_translations')->nullable()->after('content');
            $table->json('category_translations')->nullable()->after('category');
            $table->json('meta_title_translations')->nullable()->after('meta_title');
            $table->json('meta_description_translations')->nullable()->after('meta_description');
            $table->json('meta_keywords_translations')->nullable()->after('meta_keywords');
        });

        // AboutPages table - translatable fields
        Schema::table('about_pages', function (Blueprint $table) {
            $table->json('hero_title_translations')->nullable()->after('hero_title');
            $table->json('hero_title_highlight_translations')->nullable()->after('hero_title_highlight');
            $table->json('hero_description_translations')->nullable()->after('hero_description');
            $table->json('vision_title_translations')->nullable()->after('vision_title');
            $table->json('vision_description_translations')->nullable()->after('vision_description');
            $table->json('mission_title_translations')->nullable()->after('mission_title');
            $table->json('mission_description_translations')->nullable()->after('mission_description');
            $table->json('timeline_badge_translations')->nullable()->after('timeline_badge');
            $table->json('timeline_title_translations')->nullable()->after('timeline_title');
            $table->json('values_title_translations')->nullable()->after('values_title');
            $table->json('team_badge_translations')->nullable()->after('team_badge');
            $table->json('team_title_translations')->nullable()->after('team_title');
            $table->json('commitment_badge_translations')->nullable()->after('commitment_badge');
            $table->json('commitment_title_translations')->nullable()->after('commitment_title');
            $table->json('commitment_title_highlight_translations')->nullable()->after('commitment_title_highlight');
            $table->json('commitment_description_translations')->nullable()->after('commitment_description');
            $table->json('compliance_title_translations')->nullable()->after('compliance_title');
            $table->json('compliance_description_translations')->nullable()->after('compliance_description');
            $table->json('contact_question_translations')->nullable()->after('contact_question');
            $table->json('contact_description_translations')->nullable()->after('contact_description');
        });

        // HomePages table - translatable fields
        Schema::table('home_pages', function (Blueprint $table) {
            $table->json('main_title_translations')->nullable()->after('main_title');
            $table->json('main_subtitle_translations')->nullable()->after('main_subtitle');
            $table->json('main_description_translations')->nullable()->after('main_description');
            $table->json('main_badge_text_translations')->nullable()->after('main_badge_text');
            $table->json('cta_button_text_translations')->nullable()->after('cta_button_text');
            $table->json('video_button_text_translations')->nullable()->after('video_button_text');
            $table->json('statistics_title_translations')->nullable()->after('statistics_title');
            $table->json('statistics_subtitle_translations')->nullable()->after('statistics_subtitle');
            $table->json('statistics_description_translations')->nullable()->after('statistics_description');
            $table->json('statistics_badge_text_translations')->nullable()->after('statistics_badge_text');
            $table->json('map_location_title_translations')->nullable()->after('map_location_title');
            $table->json('map_address_line1_translations')->nullable()->after('map_address_line1');
            $table->json('map_address_line2_translations')->nullable()->after('map_address_line2');
            $table->json('footer_brand_name_translations')->nullable()->after('footer_brand_name');
            $table->json('footer_brand_description_translations')->nullable()->after('footer_brand_description');
            $table->json('footer_copyright_text_translations')->nullable()->after('footer_copyright_text');
        });

        // HomePageServices table - translatable fields
        Schema::table('home_page_services', function (Blueprint $table) {
            $table->json('title_translations')->nullable()->after('title');
            $table->json('subtitle_translations')->nullable()->after('subtitle');
            $table->json('description_translations')->nullable()->after('description');
            $table->json('badge_text_translations')->nullable()->after('badge_text');
            $table->json('card_title_translations')->nullable()->after('card_title');
            $table->json('card_description_translations')->nullable()->after('card_description');
            $table->json('cta_button_text_translations')->nullable()->after('cta_button_text');
        });

        // Testimonials table - translatable fields
        Schema::table('testimonials', function (Blueprint $table) {
            $table->json('name_translations')->nullable()->after('name');
            $table->json('position_translations')->nullable()->after('position');
            $table->json('company_translations')->nullable()->after('company');
            $table->json('testimonial_translations')->nullable()->after('testimonial');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn([
                'title_translations',
                'description_translations',
                'category_translations',
            ]);
        });

        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn([
                'title_translations',
                'excerpt_translations',
                'content_translations',
                'category_translations',
                'meta_title_translations',
                'meta_description_translations',
                'meta_keywords_translations',
            ]);
        });

        Schema::table('about_pages', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title_translations',
                'hero_title_highlight_translations',
                'hero_description_translations',
                'vision_title_translations',
                'vision_description_translations',
                'mission_title_translations',
                'mission_description_translations',
                'timeline_badge_translations',
                'timeline_title_translations',
                'values_title_translations',
                'team_badge_translations',
                'team_title_translations',
                'commitment_badge_translations',
                'commitment_title_translations',
                'commitment_title_highlight_translations',
                'commitment_description_translations',
                'compliance_title_translations',
                'compliance_description_translations',
                'contact_question_translations',
                'contact_description_translations',
            ]);
        });

        Schema::table('home_pages', function (Blueprint $table) {
            $table->dropColumn([
                'main_title_translations',
                'main_subtitle_translations',
                'main_description_translations',
                'main_badge_text_translations',
                'cta_button_text_translations',
                'video_button_text_translations',
                'statistics_title_translations',
                'statistics_subtitle_translations',
                'statistics_description_translations',
                'statistics_badge_text_translations',
                'map_location_title_translations',
                'map_address_line1_translations',
                'map_address_line2_translations',
                'footer_brand_name_translations',
                'footer_brand_description_translations',
                'footer_copyright_text_translations',
            ]);
        });

        Schema::table('home_page_services', function (Blueprint $table) {
            $table->dropColumn([
                'title_translations',
                'subtitle_translations',
                'description_translations',
                'badge_text_translations',
                'card_title_translations',
                'card_description_translations',
                'cta_button_text_translations',
            ]);
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn([
                'name_translations',
                'position_translations',
                'company_translations',
                'testimonial_translations',
            ]);
        });
    }
};
