<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecretCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'clue',
        'cipher_text',
        'revealed_text',
        'sort_order',
        'is_hidden',
    ];

    protected $casts = [
        'is_hidden' => 'boolean',
    ];
}
