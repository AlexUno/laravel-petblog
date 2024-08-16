<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();

        $tag->update($data);

        return redirect()->route('admin.tags.index');
    }
}
