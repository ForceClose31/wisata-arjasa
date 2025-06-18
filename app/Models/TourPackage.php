<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'duration',
        'itinerary',
        'includes',
        'excludes',
        'images',
        'is_available'
    ];

    protected $casts = [
        'itinerary' => 'array',
        'includes' => 'array',
        'excludes' => 'array',
        'images' => 'array'
    ];
}
