<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function index()
    {
    	return view('website/website');
    }

    public function showLogin()
    {
        return view('auth/login');
    }

    public function doLogin()
    {

    }
}