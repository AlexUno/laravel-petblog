<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Admin\BaseController;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $countUsers = User::all()->count();
        return view('admin.dashboard.index', compact('countUsers'));
    }
}
