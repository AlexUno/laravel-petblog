<?php

namespace App\Http\Controllers\Profile;

use App\Services\UserService;

class MainController extends BaseController
{
    public $service;

    public function __construct(UserService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
}
