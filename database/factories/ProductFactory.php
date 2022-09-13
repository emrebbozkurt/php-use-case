<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(2, true),
            'image' => 'images/products/thumbnail.jpg',
            'price' => $this->faker->randomFloat(2, 0, 100)
        ];
    }
}
