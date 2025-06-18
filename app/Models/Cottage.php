<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cottage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'capacity',
        'facilities',
        'images',
        'is_available'
    ];

    protected $casts = [
        'facilities' => 'array',
        'images' => 'array'
    ];
}
