<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;
use Illuminate\Http\Request;

class DestroyController extends MainController
{
    public function __invoke(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
