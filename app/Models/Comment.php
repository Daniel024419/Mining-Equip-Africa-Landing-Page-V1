<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    protected $fillable = [
        'content',
        'post_id',
        'user_id',
        'parent_id'
    ];

     // A comment belongs to a post
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    // A comment belongs to a user (author)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // A comment may have one parent (for replies)
    public function parent(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }

    // A comment may have many replies
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('user', 'replies');
    }

    // Check if this is a reply
    public function isReply(): bool
    {
        return !is_null($this->parent_id);
    }
}
