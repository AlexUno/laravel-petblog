<?php

namespace App\Http\Controllers\Profile\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class EditController extends MainController
{
    public function __invoke(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('profile.posts.edit', compact('post', 'categories', 'tags'));
    }
}
