<?php

namespace App\Http\Controllers\Dashboard\Posts;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::query()->latest()->paginate(10);
        return view('dashboard.posts.index', ['posts' => $posts]);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'required|string|max:255|unique:posts,slug',
            'excerpt'       => 'nullable|string|max:500',
            'content'       => 'required|string',
            'image'         => 'nullable|image|max:3072',
            'published_at'  => 'nullable|date',
        ]);

        DB::beginTransaction();

        try {
            $post = new Post();
            $post->title        = $request->title;
            $post->slug         = $request->slug;
            $post->excerpt      = $request->excerpt;
            $post->content      = $request->content;
            $post->published_at = $request->published_at;
            $post->user_id      = Auth::id();

            if ($request->hasFile('image')) {
                $post->image = $request->file('image')->store('posts', 'public');
            }

            $post->save();

            DB::commit();

            return redirect()->back()->with('success', 'Post created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create post.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     */
    public function edit(Post $post)
    {
        return view('', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'         => 'required|string|max:255',
            'slug'          => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'excerpt'       => 'nullable|string|max:500',
            'content'       => 'required|string',
            'image'         => 'nullable|image|max:3072',
            'published_at'  => 'nullable|date',
        ]);

        DB::beginTransaction();

        try {
            $post->title        = $request->title;
            $post->slug         = $request->slug;
            $post->excerpt      = $request->excerpt;
            $post->content      = $request->content;
            $post->published_at = $request->published_at;

            if ($request->hasFile('image')) {
                $post->image = $request->file('image')->store('posts', 'public');
            }

            $post->save();

            DB::commit();

            return redirect()->back()->with('success', 'Post updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to update post.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $post)
    {
        $post = Post::find($post);
        try {
            $post->delete();
            return redirect()->back()->with('success', 'Post deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete post.');
        }
    }
}
