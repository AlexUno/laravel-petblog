<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
