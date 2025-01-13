<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        'image_data',
        'image_type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        if ($this->image_data && $this->image_type) {
            return "data:{$this->image_type};base64,{$this->image_data}";
        }
        return null;
    }
}