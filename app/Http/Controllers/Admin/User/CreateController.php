<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function __invoke()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
}
