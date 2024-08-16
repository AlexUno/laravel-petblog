<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }
}
