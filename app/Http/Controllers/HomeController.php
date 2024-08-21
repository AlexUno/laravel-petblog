<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $latestPosts = Post::latest()->get()->take(3);
        return view('home', compact('latestPosts'));
    }
}
