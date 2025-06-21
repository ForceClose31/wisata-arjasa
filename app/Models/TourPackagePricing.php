<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackagePricing extends Model
{
    use HasFactory;

    protected $fillable = ['tour_package_id', 'group_size', 'price', 'variant'];

    public function package()
    {
        return $this->belongsTo(TourPackage::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getFullDescriptionAttribute()
    {
        return "{$this->group_size}" . ($this->variant ? " ({$this->variant})" : '');
    }
}
