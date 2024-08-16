<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Tag;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tags.index');
    }
}
