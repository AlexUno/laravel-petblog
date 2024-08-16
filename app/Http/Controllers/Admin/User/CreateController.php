<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Role;
use Illuminate\Http\Request;

class CreateController extends MainController
{
    public function __invoke()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
}
