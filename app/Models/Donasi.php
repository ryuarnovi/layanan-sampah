<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends Model
{
    use HasFactory;

    protected $table = 'donasi';
    
    protected $fillable = [
        'title',
        'description',
        'target_amount',
        'current_amount',
        'deadline',
        'status'
    ];

    protected $casts = [
        'deadline' => 'datetime',
        'target_amount' => 'decimal:2',
        'current_amount' => 'decimal:2'
    ];
}