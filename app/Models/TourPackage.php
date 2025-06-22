<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TourPackage extends Model
{
    use HasFactory, HasTranslations;

    /**
     * The attributes that are translatable
     *
     * @var array
     */
    public $translatable = [
        'name',
        'description',
        'duration',
        'itinerary',
        'includes',
        'excludes',
        'highlights'
    ];

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
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

    /**
     * The attributes that should be cast
     *
     * @var array
     */
    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
        'is_available' => 'boolean'
    ];

    /**
     * Get the package type that owns the tour package
     */
    public function packageType()
    {
        return $this->belongsTo(PackageType::class);
    }

    /**
     * Get all pricing options for the tour package
     */
    public function pricings()
    {
        return $this->hasMany(TourPackagePricing::class);
    }

    /**
     * Get the base price attribute
     *
     * @return mixed
     */
    public function getBasePriceAttribute()
    {
        return $this->pricings->sortBy('price')->first();
    }

    /**
     * Convert the model instance to an array.
     *
     * @return array
     */
    public function toArray()
    {
        $attributes = parent::toArray();

        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, app()->getLocale());
        }

        return $attributes;
    }
}
