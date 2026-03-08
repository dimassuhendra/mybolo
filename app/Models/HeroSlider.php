<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    protected $fillable = [
        'image_path',
        'video_url',
        'duration',
        'title',
        'subtitle',
        'nav_label',
        'order',
        'is_active'
    ];
}
