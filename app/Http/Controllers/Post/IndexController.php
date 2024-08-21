<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(10);
        $tags = Tag::all();
        $latestPosts = Post::latest()->get()->take(3);
        return view('posts.index', compact('posts', 'latestPosts', 'tags'));
    }
}
