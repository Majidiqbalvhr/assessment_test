<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            Post::create([
                'title' => $faker->sentence(3), // Generate a sentence with 3 words as the product name
                'slug' => $this->faker->slug, // Generate a random float between 1 and 1000 for the price
                'Categories' => $faker->word, // Generate a random word for categories
                'description' => $faker->paragraph, // Generate a paragraph for the description
                'product_img' => $faker->imageUrl(), // Generate a random image URL
                'user_id' => 1
            ]);
        }
    }
}
