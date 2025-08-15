<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class TourPackage extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = [
        'name',
        'description',
        'duration',
        'highlights'
    ];

    protected $fillable = [
        'package_type_id',
        'name',
        'slug',
        'description',
        'duration',
        'highlights',
        'images',
        'pdf_path',
        'is_featured',
        'is_available'
    ];

    protected $casts = [
        'images' => 'array',
        'highlights' => 'array',
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

    public function toArray()
    {
        $attributes = parent::toArray();

        foreach ($this->getTranslatableAttributes() as $field) {
            $attributes[$field] = $this->getTranslation($field, app()->getLocale());
        }

        return $attributes;
    }
}
