<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Cottage extends Model
{
    use HasFactory, HasTranslations;

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
        'images' => 'array',
        'is_available' => 'boolean',
    ];

    public $translatable = ['name', 'description', 'facilities'];
}
