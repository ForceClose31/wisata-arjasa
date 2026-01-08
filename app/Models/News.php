<?php

namespace App\Models;

use App\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory, SoftDeletes, HasTranslations, Loggable;

    public $translatable = ['title', 'excerpt', 'content', 'meta_title', 'meta_description', 'meta_keywords'];

    protected $fillable = [
        'admin_id',
        'title',
        'slug',
        'excerpt',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'og_image',
        'is_published',
        'published_at',
        'views_count'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
        'views_count' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            $title = is_array($news->title)
                ? ($news->title[config('app.fallback_locale')] ?? '')
                : $news->title;
            $news->slug = Str::slug($title);

            if ($news->is_published && !$news->published_at) {
                $news->published_at = now();
            }
        });

        static::updating(function ($news) {
            if ($news->isDirty('title')) {
                $title = is_array($news->title)
                    ? ($news->title[config('app.fallback_locale')] ?? '')
                    : $news->title;
                $news->slug = Str::slug($title);
            }

            if ($news->isDirty('is_published') && $news->is_published && !$news->published_at) {
                $news->published_at = now();
            }
        });
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(NewsComment::class);
    }

    public function approvedComments(): HasMany
    {
        return $this->hasMany(NewsComment::class)
            ->where('status', 'approved')
            ->whereNull('parent_id')
            ->with('replies')
            ->latest();
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now());
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('published_at', 'desc');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function incrementViewCount()
    {
        $this->increment('views_count');
    }

    public function getMetaTitleAttribute($value)
    {
        $meta = json_decode($value, true);
        if ($meta && isset($meta[app()->getLocale()])) {
            return $meta[app()->getLocale()];
        }
        return $this->getTranslation('title', app()->getLocale());
    }

    public function getMetaDescriptionAttribute($value)
    {
        $meta = json_decode($value, true);
        if ($meta && isset($meta[app()->getLocale()])) {
            return $meta[app()->getLocale()];
        }
        return Str::limit($this->getTranslation('excerpt', app()->getLocale()), 160);
    }

    public function getOgImageAttribute($value)
    {
        return $value ?: $this->featured_image;
    }
}
