<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
    	if ($user = Auth::user())
    	{
    		return view('dashboard/dashboard', compact('user'));
    	}
    	else
    	{
    		abort('404');
    	}
    }

    public function admin()
    {
    	if ($user = Auth::user())
    	{
    		return view('dashboard/admin', compact('user'));
    	}
    	else
    	{
    		abort('404');
    	}
    }

    public function blog()
    {
    	if ($user = Auth::user())
    	{
    		return view('dashboard/blog', compact('user'));
    	}
    	else
    	{
    		abort('404');
    	}
    }
} 
