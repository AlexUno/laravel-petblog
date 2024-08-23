<?php

namespace App\Http\Controllers\Profile\Post;

use App\Http\Controllers\Profile\BaseController;
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
