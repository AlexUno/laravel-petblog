<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Admin\BaseController;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    public function __invoke()
    {
        return view('admin.tags.create');
    }
}
