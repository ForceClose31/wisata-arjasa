<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackagePricing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['tour_package_id', 'group_size', 'price', 'variant'];

    /**
     * The attributes that should be cast
     *
     * @var array
     */
    protected $casts = [
        'price' => 'integer'
    ];

    /**
     * Get the tour package that owns this pricing
     */
    public function package()
    {
        return $this->belongsTo(TourPackage::class, 'tour_package_id');
    }

    /**
     * Get formatted price (Rp format)
     *
     * @return string
     */
    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    /**
     * Get full description with variant if exists
     *
     * @return string
     */
    public function getFullDescriptionAttribute()
    {
        $description = $this->group_size;

        if ($this->variant) {
            $description .= " ({$this->variant})";
        }

        return $description;
    }
}
