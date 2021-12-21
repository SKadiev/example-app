<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewStoreRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Booking;
use App\Models\Review;
use App\Services\ReviewService;

class ReviewController extends Controller
{
    public function show ($id) {

        return new ReviewResource(Review::findOrFail($id));
    }
    
    public function store (ReviewService $reviewService, ReviewStoreRequest $request) {
       
        $data = $request->validated();
        $review = $reviewService->storeReview($data);
        return new ReviewResource($review);
    }
}
