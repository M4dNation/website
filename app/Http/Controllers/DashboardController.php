<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;
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
    	return view('dashboard/dashboard');
    }

    public function admin()
    {
        return view('dashboard/admin');
    }

    public function blog()
    {
    	return view('dashboard/blog');
    }

    public function users()
    {
        $users = $this->userRepository->all();

        return view('dashboard/users', compact('users'));
    }

    public function user()
    {
        return view('dashboard/user');
    }

    public function editUser($id)
    {
        $user = $this->userRepository->byId($id);

        if (is_null($user) || Auth::user()->id !== intval($id))
        {
            abort('404');
        }

        return view('dashboard/edit_user', compact('user'));
    }

    public function createUser(UserRequest $request)
    {
        $this->userRepository->store($request->all());

        return redirect('dashboard/users');
    }

    public function saveUser(EditUserRequest $request, $id)
    {
        $this->userRepository->update($id, $request->all());

        return redirect('dashboard/users');
    }

    public function deleteUser($id)
    {
        $this->userRepository->destroy($id);

        return redirect('dashboard/users');
    }

}