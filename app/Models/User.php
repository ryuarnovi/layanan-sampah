<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Add this method to test inheritance
    public function testSave()
    {
        Log::info('Base class:', ['class' => get_parent_class($this)]);
        return $this->save();
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'avatar',
        'location',
        'notification_status',
        'theme',
        'language'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'notification_status' => 'boolean',
        'email_notifications' => 'boolean',

    ];
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}