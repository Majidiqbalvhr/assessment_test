<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Generate a sentence with 3 words as the product name
            'slug' => $this->faker->slug, // Generate a random float between 1 and 1000 for the price
            'Categories' => $this->faker->word, // Generate a random word for categories
            'description' => $this->faker->paragraph(1), // Generate a paragraph for the description
            'post_img' => $this->faker->imageUrl(), // Generate a random image URL
            'user_id' => 1, // Generate a random image URL
            'views' => 1, // Generate a random image URL
        ];
    }
}
