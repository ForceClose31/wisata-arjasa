<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'location',
        'operational_hours',
        'image',
        'type',
        'views_count',
        'admin_id'
    ];

    public function category()
    {
        return $this->belongsTo(DestinationCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

    // For multilingual support
    public function getTranslation($field, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $translations = json_decode($this->{$field}, true);
        return $translations[$locale] ?? $this->{$field};
    }
}
