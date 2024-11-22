<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'title',
        'year',
        'rating',
        'image',
        'created_at',
        'updated_at',
    ];

    //Movie can have many reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    //Movie can have many directors
    public function directors()
    {
        return $this->belongsToMany(Director::class);
    }
}
