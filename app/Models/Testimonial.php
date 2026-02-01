<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'position',
        'body',
        'stars',
        'status',
        'is_featured',
        'source',
        'email'
    ];

    // Scope untuk mempermudah query di Controller
    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
