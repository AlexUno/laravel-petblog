<?php

namespace App\Http\Controllers\Post\Comment;


use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $data['post_id'] = $post->id;

        Comment::create($data);

        return redirect()->back();
    }
}
