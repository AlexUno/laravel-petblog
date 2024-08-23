<?php

namespace App\Http\Controllers\Profile\Post;

use App\Models\Post;
use Illuminate\Http\Request;

class DestroyController extends MainController
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('profile.posts.index');
    }
}
