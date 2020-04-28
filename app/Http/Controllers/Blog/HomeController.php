<?php

namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        $posts = Post::getPublishedPosts();
        return view('blog.home',compact('posts'));
    }
}
