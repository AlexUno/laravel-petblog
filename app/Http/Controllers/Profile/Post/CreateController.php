<?php

namespace App\Http\Controllers\Profile\Post;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class CreateController extends MainController
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('profile.posts.create', compact('categories', 'tags'));
    }
}
