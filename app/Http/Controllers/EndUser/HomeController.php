<?php

namespace App\Http\Controllers\EndUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {

        return view('/content/custom-pages/end-user/index');
    }
}
