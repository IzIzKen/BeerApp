<?php

namespace Database\Factories;

use App\Models\Beer;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeerFactory extends Factory
{
    protected $model = Beer::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brewery_id' => $this->faker->numberBetween(1,30),
            'style_id' => $this->faker->numberBetween(1,20),
            'name' => $this->faker->unique()->lastName,
            'price' => $this->faker->numberBetween(3,10)*100,
            'bitterness' => $this->faker->numberBetween(1,5),
            'sweetness' => $this->faker->numberBetween(1,5),
            'acidity' => $this->faker->numberBetween(1,5),
            'deepness' => $this->faker->numberBetween(1,5),
            'strength' => $this->faker->numberBetween(1,5),
            'img_url' => 'img/dummy.png',
        ];
    }
}
