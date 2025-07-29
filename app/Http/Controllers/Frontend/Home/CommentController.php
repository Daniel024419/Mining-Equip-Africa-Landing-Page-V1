<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * store
     *
     * @param  mixed $request
     * @param  mixed $post
     * @return void
     */
    public function store(Request $request, Post $post)
    {
        try {
            $request->validate([
                'content' => 'required|string|max:1000',
                'parent_id' => 'nullable|exists:comments,id'
            ]);

            DB::beginTransaction();

            $post->comments()->create([
                'content' => $request->input('content'),
                'user_id' => Auth::id(),
                'parent_id' => $request->input('parent_id'),
            ]);

            DB::commit();

            return back()->with('success', 'Comment posted successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to post the comment. Please try again.');
        }
    }


    /**
     * destroy
     *
     * @param  mixed $comment
     * @return void
     */
    public function destroy(Comment $comment)
    {
        try {

            DB::beginTransaction();

            $comment->delete();

            DB::commit();

            return back()->with('success', 'Comment deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Failed to delete the comment. Please try again.');
        }
    }
}
