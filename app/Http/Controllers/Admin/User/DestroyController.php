<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\User;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    public function __invoke(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
