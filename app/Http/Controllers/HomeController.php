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

    public function register()
    {

    }

    public function login()
    {

    }

    public function logout()
    {

    }

    public function lostpassword()
    {

    }

    public function profile()
    {
    	return view('welcome');
    }

    public function newProfile()
    {

    }

    public function updateProfile()
    {

    }

    public function deleteProfile()
    {
    	
    }
}