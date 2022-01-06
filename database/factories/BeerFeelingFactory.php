<?php

namespace Database\Factories;

use App\Models\beerFeeling;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeerFeelingFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = beerFeeling::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'beer_id' => $this->faker->numberBetween(1,54),
            'feeling_id' =>  $this->faker->numberBetween(1,17),
        ];
    }
}
