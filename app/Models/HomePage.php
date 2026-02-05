<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HomePage extends Model
{
    protected $fillable = [
        'main_title',
        'main_subtitle',
        'main_description',
        'main_badge_text',
        'main_badge_icon',
        'main_background_image',
        'cta_button_text',
        'cta_button_url',
        'video_button_text',
        'statistics',
        'statistics_badge_text',
        'statistics_title',
        'statistics_subtitle',
        'statistics_description',
        'map_image',
        'map_location_title',
        'map_address_line1',
        'map_address_line2',
        'map_url',
        'map_latitude',
        'map_longitude',
    ];

    protected $casts = [
        'main_description' => 'string',
        'statistics' => 'array',
    ];

    public function getMainBackgroundImageUrlAttribute(): ?string
    {
        if (! $this->main_background_image) {
            return null;
        }

        return asset('storage/'.$this->main_background_image);
    }

    public function getMapImageUrlAttribute(): ?string
    {
        if (! $this->map_image) {
            return 'https://lh3.googleusercontent.com/aida-public/AB6AXuCtmesQwp5513ujXYuNsFkHQ7Sd0wZrfusjFZFe4_i1bRHu7X6BQeawIsj17ege0neKmTs61Ig8lC113HYUqTDEy6xXKzw0Y56sM9X-6j2Plsemu-LAFB-rZv1_amXWAzvLcpYTDA7DWfkS7fZI5gOwk1jrMWZ_XvOt0OSrULviwyqz15-SmWPrTz8XyVR7bCtk1HEcjvGXTPGt4y-wymUXrJl5ULYu4Fv22w4zIv74-wW5tCKP8FbysYZvoKqqxRe8C_sbeQ17z9RM';
        }

        return asset('storage/'.$this->map_image);
    }

    public function services(): HasMany
    {
        return $this->hasMany(HomePageService::class)->orderBy('order');
    }

    public function activeServices(): HasMany
    {
        return $this->hasMany(HomePageService::class)->where('is_active', true)->orderBy('order');
    }

    public static function getCurrent(): self
    {
        return static::firstOrCreate([], [
            'main_title' => 'مجموعة بلقيس',
            'main_subtitle' => 'للاستثمارات الفاخرة',
            'main_description' => 'اكتشف قمة السياحة الفاخرة في تركيا، والعقارات المتميزة، والاستثمارات الاستراتيجية. نحن نصنع تجارب لا تُنسى ومستقبلاً واعداً.',
            'main_badge_text' => 'التميز والفخامة',
            'main_badge_icon' => 'stars',
            'cta_button_text' => 'استكشف خدماتنا',
            'video_button_text' => 'شاهد الفيديو',
        ]);
    }
}
