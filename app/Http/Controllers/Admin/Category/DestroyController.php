<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\BaseController;
use App\Models\Category;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    public function __invoke(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
