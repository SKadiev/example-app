<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookable extends Model
{
    use HasFactory;

    protected $filables = [
        'title', 'content'
    ];

    public function bookings() 
    {
        return $this->hasMany(Booking::class);
    }

    public function availableFor($from, $to): bool
    {
        return 0 !== $this->bookings()->betweenDates($from, $to)->count();
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
   
    
}
