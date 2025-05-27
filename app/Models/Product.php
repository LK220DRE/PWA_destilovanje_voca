<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'image', 
        'is_featured', 
        'distillery_id'
    ];

    public function distillery()
    {
        return $this->belongsTo(Distillery::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : asset('images/default.png');
    }
}