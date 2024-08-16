<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\SigninRequest;

class StoreController extends MainController
{
    public function __invoke(SigninRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.users.index');
    }
}
