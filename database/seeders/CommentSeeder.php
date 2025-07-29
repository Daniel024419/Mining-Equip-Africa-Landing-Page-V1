<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Create 3 posts
        $posts = Post::factory()
            ->count(3)
            ->create();

        // For each post, create 2-4 comments
        $posts->each(function ($post) {
            $comments = Comment::factory()
                ->count(rand(2, 4))
                ->for($post)
                ->create();

            // For each comment, create 1-3 replies
            $comments->each(function ($comment) use ($post) {
                Comment::factory()
                    ->count(rand(1, 3))
                    ->for($post)
                    ->reply()
                    ->create(['parent_id' => $comment->id]);
            });
        });
    }
}
