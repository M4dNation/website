<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\UserRepository;
use App\Repositories\ArticleRepository;


class DashboardController extends Controller
{
    protected $articleRepository;
    protected $userRepository;

    public function __construct(ArticleRepository $articleRepository, 
        UserRepository $userRepository)
    {
        $this->articleRepository = $articleRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
    	return view('dashboard/dashboard', compact('user'));
    }

    public function admin()
    {
        return view('dashboard/admin', compact('user'));
    }

    public function blog()
    {
    	return view('dashboard/blog', compact('user'));
    }

    public function users()
    {
        $users = $this->userRepository->all();

        return view('dashboard/users', compact('user', 'users'));
    }

    public function saveUser(UserRequest $request)
    {
        
    }
} 
