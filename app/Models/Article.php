<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'category',
        'published_at',
        'is_published'
    ];

    protected $dates = ['published_at'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function incrementReadCount()
    {
        $this->views_count++;
        $this->save();
    }
}
