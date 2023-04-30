<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $conditions = ['as good as new', 'excellent', 'good', 'fair'];
        $languages = ['English', 'Burmese', 'Chinese', 'Korean', 'Japanese'];
        return [
            'title' => $this->faker->sentence(),
            'type' => $this->faker->word(),
            'condition' => $conditions[rand(0,3)],
            'description' => $this->faker->realText(200),
            'stock' => $this->faker->randomDigit(0,30),
            'price' => $this->faker->numberBetween(2000,30000),
            'author' => $this->faker->name(),
            'language' => $languages[rand(0,4)],
            'number_of_pages' => $this->faker->numberBetween(20,150),
            'publication_date' => $this->faker->dateTimeBetween('-2 years', 'yesterday'),
        ];
    }
}
