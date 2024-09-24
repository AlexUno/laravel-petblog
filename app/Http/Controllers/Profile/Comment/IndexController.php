<?php

namespace App\Http\Controllers\Profile\Comment;

use App\Http\Controllers\Profile\BaseController;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $user = Auth::user();

        $comments = Comment::whereHas('post', function($query) use ($user){
            $query->where('user_id', $user->id);
        })
        ->where('user_id', '!=', $user->id)
        ->where('is_read', false)
        ->orderBy('created_at', 'desc')
        ->paginate(10);

        return view('profile.comments.index', compact('comments'));
    }
}
