<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = $this->faker->numberBetween(3, 10);

        return [
            //
            'title' => $this->faker->sentence(5, true),
            'description' => $this->faker->sentences(5, true),
            'surface' => $this->faker->numberBetween(40, 300),
            'rooms' => $rooms,
            'bedrooms' => $this->faker->numberBetween(1, $rooms),
            'bathrooms' => $this->faker->numberBetween(1, $rooms),
            'floor' => $this->faker->numberBetween(1, 4),
            'price' => $this->faker->numberBetween(10000, 100000),
            'address' => $this->faker->address,
            'sold' => false,
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            
        ];
    }

    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}
