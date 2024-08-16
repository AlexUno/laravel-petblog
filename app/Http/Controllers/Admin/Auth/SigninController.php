<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\SigninRequest;
use Illuminate\Support\Facades\Auth;

class SigninController extends Controller
{
    public function __invoke(SigninRequest $request)
    {
        $data = $request->validated();
        $is_remember = isset($data['remember']) ?? false;
        unset($data['remember']);

        if (Auth::attempt($data, $is_remember)) {
            $request->session()->regenerate();
            if (Auth::user()->isAdmin()) {
                return redirect()->intended(route('admin.dashboard.index'));
            } else {
                return redirect()->intended(route('index'));
            }
        }

        return redirect()->back();
    }
}
