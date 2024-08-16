<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends MainController
{
    public function __invoke(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }
}
