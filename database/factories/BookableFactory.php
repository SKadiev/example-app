<?php

namespace Database\Factories;

use App\Models\Bookable;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BookableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Bookable::class;

    public function definition()
    {
        $suffix = [
            'Villa',
            'House',
            'Cottage',
            'Luxury Vilass',
            'Cheap House',
            'Rooms',
            'Cheap Rooms',
            'Luxury Rooms',
            'Fancy Rooms'
        ];

        return [
            'title' => $this->faker->city . ' ' .  Arr::random($suffix),
            'content' => $this->faker->text(),

        ];
    }
}
