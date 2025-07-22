<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'facilities',
        'type',
        'views_count',
        'admin_id'
    ];

    protected $casts = [
        'title' => 'array',
        'description' => 'array',
        'facilities' => 'array',
        'location' => 'array',
        'operational_hours' => 'array',
        'type' => 'array',
    ];


    public function category()
    {
        return $this->belongsTo(DestinationCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

    public function getTranslation($field, $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $translations = $this->{$field};
        return $translations[$locale] ?? null;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($destination) {
            $defaultLocale = config('app.fallback_locale');
            $title = $destination->title[$defaultLocale] ?? '';
            $destination->slug = Str::slug($title);
        });

        static::updating(function ($destination) {
            $defaultLocale = config('app.fallback_locale');
            if ($destination->isDirty("title->{$defaultLocale}")) {
                $title = $destination->title[$defaultLocale];
                $destination->slug = Str::slug($title);
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
