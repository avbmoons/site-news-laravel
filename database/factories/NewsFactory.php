<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'author' => fake()->userName(),
            'description' => fake()->text(100),
            'status' => 'draft',
            'image' => fake()->imageUrl(),
            'source_id' => fake()->random_int(1, 15),
        ];
    }
}
