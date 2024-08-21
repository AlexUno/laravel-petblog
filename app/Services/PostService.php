<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService {
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $data['user_id'] = Auth::user()->id;

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')
                    ->put('/images/posts', $data['preview_image']);
            }

            if  (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')
                    ->put('/images/posts', $data['main_image']);
            }

            $post = Post::firstOrCreate([
                'title' => $data['title'],
                'category_id' => $data['category_id']
            ], $data);

            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        try {
            DB::beginTransaction();
            $data['user_id'] = Auth::user()->id;

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')
                    ->put('/images/posts', $data['preview_image']);
            }

            if  (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')
                    ->put('/images/posts', $data['main_image']);
            }

            $post->update($data);

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
        } catch(\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
