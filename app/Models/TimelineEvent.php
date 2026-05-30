<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimelineEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'icon',
        'happened_at',
        'sort_order',
    ];

    protected $casts = [
        'happened_at' => 'date',
    ];
}
