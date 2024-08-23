<?php

namespace App\Http\Controllers\Profile\Post;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends MainController
{
    public function __invoke()
    {
        $posts = Auth::user()->posts()->paginate(15);
        return view('profile.posts.index', compact('posts'));
    }
}
