<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\EditArticleRequest;
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
    public function articles()
    {
        $articles = $this->articleRepository->all();

        return view('dashboard/articles', compact('articles'));
    }

    public function docs()
    {
        return view('dashboard/docs');
    }

    public function article()
    {
        return view('dashboard/article');
    }

    public function editArticle($id)
    {
        $article = $this->articleRepository->byId($id);

        if (is_null($article))
        {
            abort('404');
        }

        return view('dashboard/edit_article', compact('article'));
    }

    public function createArticle(ArticleRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $this->articleRepository->store($data);

        return redirect('dashboard/articles');
    }

    public function saveArticle(EditArticleRequest $request, $id)
    {
        $this->articleRepository->update($id, $request->all());

        return redirect('dashboard/articles');
    }

    public function deleteArticle($id)
    {
        $this->articleRepository->destroy($id);

        return redirect('dashboard/articles');
    }

}