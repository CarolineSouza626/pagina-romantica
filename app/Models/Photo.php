<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'caption',
        'image_path',
        'image_url',
        'sort_order',
        'is_featured',
        'taken_at',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'taken_at' => 'date',
    ];
}
