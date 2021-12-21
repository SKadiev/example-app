<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Resources\ReviewResource;
use App\Interfaces\Reviewable;
use App\Models\Booking;
use App\Models\Review;
use App\Reviews\BookingByReviewKey;
use App\Services\ReviewService;

class ReviewController extends Controller
{

    protected $reviewable;

    public function __construct( Reviewable $reviewable)
    {
        $this->reviewable = $reviewable;
    }
    public function show ($id) {

        new BookingByReviewKey();
        return new ReviewResource(Review::findOrFail($id));
    }
    
    public function store (ReviewService $reviewService, ReviewStoreRequest $request) {
       
        $data = $request->validated();
        $review = $reviewService->storeReviewByReviewId($this->reviewable, $data);
        return new ReviewResource($review);
    }
}
