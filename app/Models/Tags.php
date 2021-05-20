<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = [
        'tag',
        'photo_id',
    ];
    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }
}
