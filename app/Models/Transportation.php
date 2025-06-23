<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Transportation extends Model
{
    use HasTranslations;

    protected $fillable = [
        'name',
        'description',
        'image',
        'phone',
        'price',
        'duration',
        'facilities',
    ];

    public $translatable = ['name', 'description', 'duration', 'facilities'];

    protected $casts = [
        'facilities' => 'array',
    ];
}
