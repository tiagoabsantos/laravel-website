<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'image'
    ];

    public function tags()
    {
        return $this->hasMany(Tags::class);
    }
}
