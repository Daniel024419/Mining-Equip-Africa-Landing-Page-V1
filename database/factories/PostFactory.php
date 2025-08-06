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
            'title' => $this->faker->sentence(6),
            'slug' => $this->faker->unique()->slug,
            'excerpt' => $this->faker->paragraph(2),
            'content' => $this->faker->paragraphs(6, true),
            'image' => 'mining-logistics.jpg',
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'user_id' => \App\Models\User::factory()
        ];
    }
}
