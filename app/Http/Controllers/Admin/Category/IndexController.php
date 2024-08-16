<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::paginate(2);

        return view('admin.categories.index', compact('categories'));
    }
}
