<?php

namespace App\Http\Controllers\Profile;

class IndexController extends BaseController
{
    public function __invoke()
    {
        return view('profile.index');
    }
}
