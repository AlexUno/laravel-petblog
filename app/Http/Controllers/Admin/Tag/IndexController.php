<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $tags = Tag::paginate(2);

        return view('admin.tags.index', compact('tags'));
    }
}
