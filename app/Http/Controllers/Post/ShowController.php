<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        $latestPosts = Post::latest()->get()->take(3);
        $tags = Tag::all();
        $prevPost = Post::where('id', '<', $post->id)
            ->orderBy('id', 'desc')
            ->first();
        $nextPost = Post::where('id', '>', $post->id)
            ->orderBy('id', 'asc')
            ->first();
        return view('posts.show', compact(
            'post',
            'latestPosts',
            'tags',
            'prevPost',
            'nextPost'
        ));
    }
}
