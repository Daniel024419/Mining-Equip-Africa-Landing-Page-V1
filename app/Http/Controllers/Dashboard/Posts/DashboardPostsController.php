<?php

namespace App\Http\Controllers\Dashboard\Posts;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, DB};
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Service\FileUploadInterface;

class DashboardPostsController extends Controller
{
    /**
     * destinationPath
     *
     * @var string
     */
    public $destinationPath = '';

    public function __construct(
        private FileUploadInterface $fileUploadInterface
    ) {
        $this->destinationPath = public_path('/files');
    }

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

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $post->image = $this->fileUploadInterface->uploadFiles($request->file('image'), $this->destinationPath);
            } else {
                $post->image = 'defualt.png';
            }

            $post->save();

            DB::commit();

            return redirect()->back()->with('success', 'Post created successfully!');
        } catch (\Exception $e) {
            logger($e);
            
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to create post.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(int $post)
    {
        $post = Post::find($post);
        return view('dashboard.posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     */
    public function edit(int $post)
    {
        $post = Post::find($post);

        return view('dashboard.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $post)
    {
        $post = Post::find($post);

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

            $oldimageName = $post->image ?? '';

            $imageFile = $request->has('image') ? $request->file('image') : '';

            if ($imageFile && $imageFile->isValid()) {
                $post->image = $this->fileUploadInterface->uploadFiles($imageFile, $this->destinationPath);
                if (file_exists($this->destinationPath . '/' . $oldimageName)) {
                    unlink($this->destinationPath . '/' . $oldimageName);
                }
            } else {
                $post->image = $oldimageName;
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
            DB::beginTransaction();

            if ($post->image) {
                if (file_exists($this->destinationPath . '/' . $post->image)) {
                    unlink($this->destinationPath . '/' . $post->image);
                }
            }
            
            $post->delete();
            DB::commit();
            return redirect()->back()->with('success', 'Post deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Failed to delete post.');
        }
    }
}