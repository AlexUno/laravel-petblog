<?php

namespace App\Http\Controllers\Profile;

use App\Http\Requests\Profile\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class UpdateController extends MainController
{
    public function __invoke(UpdateRequest $request)
    {
        $data = $request->validated();
        $this->service->update($data, Auth::user());

        return redirect()->back();
    }
}
