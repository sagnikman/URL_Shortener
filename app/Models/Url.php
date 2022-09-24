<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'slug',
        'user_id'
    ];

    protected $casts = [
        'integer' => 'user_id'
    ];
}
