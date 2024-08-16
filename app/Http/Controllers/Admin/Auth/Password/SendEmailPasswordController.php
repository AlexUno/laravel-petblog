<?php

namespace App\Http\Controllers\Admin\Auth\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\Password\EmailRequest;
use Illuminate\Support\Facades\Password;

class SendEmailPasswordController extends Controller
{
    public function __invoke(EmailRequest $request)
    {
        $data = $request->validated();

        $status = Password::sendResetLink(['email' => $data['email']]);

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}
