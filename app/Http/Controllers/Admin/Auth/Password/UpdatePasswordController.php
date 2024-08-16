<?php

namespace App\Http\Controllers\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\Password\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UpdatePasswordController extends Controller
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();

        $status = Password::reset([
            'email' => $data['email'],
            'password' => $data['password'],
            'password_confirmation' => $data['password_confirmation'],
            'token' => $data['token']
        ], function($user, $password){
            $user->forceFill([
                'password' => Hash::make($password)
            ])->save();
        });

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('admin.auth.login')
            : back()->withErrors(['email' => [__($status)]]);
    }
}
