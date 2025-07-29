<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(2),
            'post_id' => Post::factory(),
            'user_id' => User::factory(),
            'parent_id' => null
        ];
    }

    public function reply()
    {
        return $this->state(function (array $attributes) {
            return [
                'parent_id' => Comment::factory()
            ];
        });
    }
}
