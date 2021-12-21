<?php

namespace App\Services;

use App\Http\Requests\ReviewStoreRequest;
use App\Interfaces\Reviewable;
use App\Models\Booking;
use App\Models\Review;

class ReviewService 
{
   public function storeReviewByReviewId( Reviewable $review, $reviewData) {

        $booking = $review->getBooking($reviewData['id']);

        if (null === $booking) {
            return abort(404);
        }

        return $this->assosiateReviewWithBooking($booking, $reviewData);
        
   }


   private function assosiateReviewWithBooking($booking, $reviewData) {
    $booking->review_key = '';
    $booking->save();

    $review = Review::make($reviewData);

    $review->booking_id = $booking->id;
    $review->bookable_id = $booking->bookable_id;
    $review->save();

    return $review;
   }
}
