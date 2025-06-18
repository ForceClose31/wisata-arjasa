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
        'subtitle',
        'description',
        'price',
        'duration',
        'min_person',
        'itinerary',
        'includes',
        'excludes',
        'highlights',
        'images',
        'is_available',
        'is_featured',
        'website_url',
        'phone_numbers'
    ];

    protected $casts = [
        'itinerary' => 'array',
        'includes' => 'array',
        'excludes' => 'array',
        'highlights' => 'array',
        'images' => 'array',
        'phone_numbers' => 'array'
    ];
}
