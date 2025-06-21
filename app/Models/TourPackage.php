<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourPackage extends Model
{

    use HasFactory;

    protected $fillable = [
        'package_type_id',
        'name',
        'slug',
        'description',
        'duration',
        'itinerary',
        'includes',
        'excludes',
        'highlights',
        'images',
        'is_featured',
        'is_available'
    ];

    protected $casts = [
        'itinerary' => 'array',
        'includes' => 'array',
        'excludes' => 'array',
        'highlights' => 'array',
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_available' => 'boolean'
    ];

    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }

    public function pricings()
    {
        return $this->hasMany(TourPackagePricing::class);
    }

    public function getBasePriceAttribute()
    {
        return $this->pricings->sortBy('price')->first();
    }
}
