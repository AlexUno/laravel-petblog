<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends MainController
{
    public function __invoke()
    {
        $posts = Post::paginate(15);
        return view('admin.posts.index', compact('posts'));
    }
}
