<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HomePageService extends Model
{
    protected $fillable = [
        'home_page_id',
        'service_key',
        'title',
        'subtitle',
        'description',
        'badge_text',
        'badge_icon',
        'background_image',
        'card_image',
        'card_title',
        'card_description',
        'card_icon',
        'order',
        'is_active',
        'stats',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'stats' => 'array',
        'order' => 'integer',
    ];

    public function homePage(): BelongsTo
    {
        return $this->belongsTo(HomePage::class);
    }
}
