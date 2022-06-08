<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Mapper;
use App\Http\Controllers\Controller;
use App\Http\IRepositories\IUserRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    protected $userRepository;
    protected $requestData;


    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->requestData = Mapper::toUnderScore(Request()->all());

    }
}
