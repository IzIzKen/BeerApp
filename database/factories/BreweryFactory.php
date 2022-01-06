<?php

namespace Database\Factories;

use App\Models\Brewery;
use Illuminate\Database\Eloquent\Factories\Factory;

class BreweryFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Brewery::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->company,
            'url' => $this->faker->unique()->url,
            'tel' => $this->faker->unique()->phoneNumber,
            'postal_code' => $this->faker->postcode,
            'prefecture' => $this->faker->prefecture,
            'city' => $this->faker->city,
            'street_address' => $this->faker->streetName,
            'after_the_street_address' => $this->faker->buildingNumber,
        ];
    }
}
