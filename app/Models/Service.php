<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['title', 'icon', 'image_path', 'file_path', 'short_description', 'features', 'wa_link'];

    protected $casts = [
        'features' => 'array', // convert JSON ke Array
    ];
}
