<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke()
    {
        if (Auth::check() && Auth::user()->isAdmin()) {
            return redirect()->intended(route('admin.dashboard.index'));
        }

        return view('admin.auth.login');
    }
}
