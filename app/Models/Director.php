<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'bio'];

    //Director can have many movies
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
