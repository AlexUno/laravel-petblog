<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $totalComments = Comment::where('post_id', $post->id)->count();
        $comments = Comment::where('post_id', $post->id)
            ->whereNull('parent_id')
            ->get();
        
        Comment::where('post_id', $post->id)
            ->where('is_read', false)
            ->where('user_id', '!=', Auth::id())
            ->update(['is_read' => true]);

        return view('posts.show', compact(
            'post',
            'latestPosts',
            'tags',
            'prevPost',
            'nextPost',
            'comments',
            'totalComments'
        ));
    }
}
