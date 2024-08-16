<?php

namespace App\Http\Controllers\Admin\Auth\Password;

use App\Http\Controllers\Controller;

class ForgotPasswordController extends Controller
{
    public function __invoke()
    {
        return view('admin.auth.passwords.email');
    }
}
