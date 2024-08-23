<?php

namespace App\Http\Controllers\Profile\Post;

use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends MainController
{
    public function __invoke(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }
}
