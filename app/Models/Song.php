<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'artist',
        'audio_path',
        'cover_path',
        'sort_order',
        'is_active',
        'duration_seconds',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
