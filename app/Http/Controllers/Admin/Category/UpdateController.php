<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();

        $category->update($data);

        return redirect()->route('admin.categories.index');
    }
}
