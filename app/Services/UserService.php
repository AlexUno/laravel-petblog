<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService {
    public function store($data)
    {
        try {
            DB::beginTransaction();
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
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $user)
    {
        $data['avatar'] = $data['avatar'] ?? NULL;

        if ($data['avatar']) {
            $data['avatar'] = Storage::disk('public')->put('/images/' . $user->id, $data['avatar']);
        } else {
            $data['avatar'] = $user->avatar;
        }

        $user->update($data);
    }
}
