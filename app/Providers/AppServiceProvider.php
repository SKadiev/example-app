<?php

namespace App\Providers;

use App\Http\Controllers\Api\ReviewController;
use App\Interfaces\Reviewable;
use App\Reviews\BookingByReviewKey;
use App\Services\ReviewService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReviewService::class, function($app) {
            return new ReviewService();
        });

     
        $this->app->when(ReviewController::class)
        ->needs(Reviewable::class)
        ->give(function($app) {
            return new BookingByReviewKey();
        });

       
       
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        // JsonResource::withoutWrapping();
       

    }
}
