<?php

namespace App\Reviews;

use App\Interfaces\Reviewable;
use App\Models\Booking;

class BookingByReviewKey  implements Reviewable {

    public function getBooking($reviewSearchType) {

        $booking = Booking::findByReviewKey($reviewSearchType);

        return $booking;
    }

}