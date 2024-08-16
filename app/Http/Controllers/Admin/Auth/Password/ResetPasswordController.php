<?php

namespace App\Http\Controllers\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function __invoke(Request $request, $token = null)
    {
        return view('admin.auth.passwords.reset', [
            'token' => $token,
            'email' => $request->email,
        ]);
    }
}
