<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\BaseController;
use App\Services\PostService;

class MainController extends BaseController
{
    public $service;
    public function __construct(PostService $service)
    {
        parent::__construct();
        $this->service = $service;
    }
}
