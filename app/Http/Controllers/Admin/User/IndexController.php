<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }
}
