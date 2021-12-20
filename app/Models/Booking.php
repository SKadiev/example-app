<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Booking extends Model
{
    use HasFactory;

    protected $filables = [
        'to', 'from'
    ];

    public function bookable() {
        return $this->belongsTo(Bookable::class);
    }

    public function scopeBetweenDates(Builder $query, $from, $to) {
        return $query->where('to', '>=', $from)
            ->where('from', '<=' , $to);
    }

    public function review () {
        return $this->hasOne(Review::class);
    }

    public static function findByReviewKey(string $reviewKey) : ?Booking {
        return static::where('review_key', $reviewKey)->with('bookable')->get()->first();
    }
   

    public static function boot() {
        parent::boot();

        static::creating(function ($booking) {
            $booking->review_key = Str::uuid();
        });
    }
}
