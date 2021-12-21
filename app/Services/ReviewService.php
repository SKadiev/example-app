<?php

namespace App\Services;

use App\Http\Requests\ReviewStoreRequest;
use App\Models\Booking;
use App\Models\Review;

class ReviewService 
{
   public function storeReview($reviewData) {

        $booking = Booking::findByReviewKey($reviewData['id']);

        if (null === $booking) {
            return abort(404);
        }

        $booking->review_key = '';
        $booking->save();

        $review = Review::make($reviewData);

        $review->booking_id = $booking->id;
        $review->bookable_id = $booking->bookable_id;
        $review->save();

        return $review;
   }
}
