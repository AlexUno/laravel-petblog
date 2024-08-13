<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $avatar = $data['avatar'] ?? NULL;
        $data['password'] = Hash::make($data['password']);
        unset($data['avatar']);

        $user = User::firstOrCreate(
            ['email' => $data['email']],
            $data
        );

        if ($avatar) {
            $path = Storage::disk('public')->put('/images/' . $user->id, $avatar);
            $user->update(['avatar' => $path]);
        }

        return redirect()->route('admin.users.index');
    }
}
