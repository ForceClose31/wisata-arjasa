<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function adminActivities()
    {
        return $this->hasMany(AdminActivity::class);
    }

    public function destination()
    {
        return $this->hasMany(Destination::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }

    public function tourPackage()
    {
        return $this->hasMany(TourPackage::class);
    }
}
