<?php

namespace App\Http\Controllers\Profile\Post;

use App\Http\Requests\Profile\Post\StoreRequest;
use Illuminate\Http\Request;

class StoreController extends MainController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('profile.posts.index');
    }
}
