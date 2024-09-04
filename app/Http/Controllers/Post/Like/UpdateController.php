<?php

namespace App\Http\Controllers\Post\Like;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateController extends BaseController
{
    public function __invoke(Request $request, Post $post)
    {
        if (!$request->has('is_like')) {
            return response()->json(['success' => false]);
        }

        $user = Auth::user();
        $like = $user->likedPosts()->where('post_id', $post->id)->first();

        if ($like) {
            if ($like->pivot->is_like == $request->is_like) {
                $post->likes()->detach($user->id);
            } else {
                $post->likes()->detach($user->id);
                $post->likes()->attach($user->id, ['is_like' => $request->is_like]);
            }
        } else {
            $post->likes()->attach($user->id, ['is_like' => $request->is_like]);
        }
        $post = $post->fresh();

        return response()->json([
            'success' => true,
            'likesCount' => $post->likesCount,
            'dislikesCount' => $post->dislikesCount]);
    }
}
