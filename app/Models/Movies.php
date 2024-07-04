<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'genre',
        'release_date',
        
    ];

    public function bookings()
    {
        return $this->hasMany(Bookings::class);
    }
}
