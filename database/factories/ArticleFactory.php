<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Type\Integer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 25),
            // 'title' => fake()->words(fake()->numberBetween(2, 6)),
            'title' => fake()->realTextBetween(5, 20),
            'img' => fake()->imageUrl(600, 400, fake()->randomElement(['virus', 'activity', 'article']), true),
            // 'contents' => fake()->paragraphs(fake()->numberBetween(3, 10), true),
            'contents' => fake()->realTextBetween(200, 1000),
            'category_id' => fake()->numberBetween(1, 3),
        ];
    }
}
