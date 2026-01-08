<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsComment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'news_id',
        'parent_id',
        'name',
        'email',
        'comment',
        'status',
        'approved_at',
        'approved_by',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'approved_at' => 'datetime'
    ];

    public function news(): BelongsTo
    {
        return $this->belongsTo(News::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(NewsComment::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(NewsComment::class, 'parent_id')
            ->where('status', 'approved')
            ->latest();
    }

    public function approver(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function approve($adminId = null)
    {
        $this->update([
            'status' => 'approved',
            'approved_at' => now(),
            'approved_by' => $adminId ?? auth()->id()
        ]);
    }

    public function reject()
    {
        $this->update([
            'status' => 'rejected',
            'approved_at' => null,
            'approved_by' => null
        ]);
    }

    public function getStatusColorAttribute()
    {
        return match ($this->status) {
            'approved' => 'text-green-600 bg-green-100',
            'rejected' => 'text-red-600 bg-red-100',
            'pending' => 'text-yellow-600 bg-yellow-100',
            default => 'text-gray-600 bg-gray-100'
        };
    }
}
