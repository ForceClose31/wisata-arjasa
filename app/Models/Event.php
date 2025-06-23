<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Event extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['title', 'description', 'type', 'status'];

    protected $fillable = [
        'title',
        'description',
        'image',
        'location',
        'start_date',
        'end_date',
        'type',
        'status',
        'category_id',
        'slug'
    ];

    protected $dates = ['start_date', 'end_date'];

    public function category()
    {
        return $this->belongsTo(EventCategory::class, 'category_id');
    }

}
