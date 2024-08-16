<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Admin\BaseController;
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
