<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $comments = $post->comments->groupBy('reply_id');
        return view('blog.post_show', compact('post','comments'));
    }
}
