<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, User $user)
    {
        $data = $request->validated();
        $data['avatar'] = $data['avatar'] ?? NULL;

        if ($data['avatar']) {
            $data['avatar'] = Storage::disk('public')->put('/images/' . $user->id, $data['avatar']);
        }

        $user->update($data);
        return redirect()->route('admin.users.index');
    }
}
