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
use App\Repositories\ImageRepository;
use App\Repositories\ArticleImageRepository;

use App\Managers\ArticleManager;


class DashboardController extends Controller
{
    protected $articleRepository;
    protected $userRepository;
    protected $imageRepository;
    protected $articleImageRepository;
    protected $ArticleManager;

    public function __construct(ArticleRepository $articleRepository, 
        UserRepository $userRepository, ImageRepository $imageRepository, ArticleImageRepository $articleImageRepository, ArticleManager $articleManager)
    {
        $this->articleRepository = $articleRepository;
        $this->userRepository = $userRepository;
        $this->imageRepository = $imageRepository;
        $this->articleImageRepository = $articleImageRepository;
        $this->articleManager = $articleManager;
    }

    /**
    * index
    * This function is used to display the dashboard
    * @return view
    */

    public function index()
    {
    	return view('dashboard/dashboard');
    }

    /**
    * blog
    * This function is used to display the blog dashboard
    * @return view
    */
    public function blog()
    {
    	return view('dashboard/blog');
    }

     /**
    * users
    * This function is used to display all the users
    * @return view
    */
    public function users()
     {
        $users = $this->userRepository->all();

        return view('dashboard/users', compact('users'));
    }

     /**
    * user
    * This function is used to display the view to edit an user
    * @return view
    */
    public function user()
    {
        return view('dashboard/user');
    }

     /**
    * editUser
    * This function is used to edit an user
    * @return view
    */
    public function editUser($id)
    {
        $user = $this->userRepository->byId($id);

        if (is_null($user) || Auth::user()->id !== intval($id))
        {
            abort('404');
        }

        return view('dashboard/edit_user', compact('user'));
    }

     /**
    * createUser
    * This function is used to create an user
    * @return view
    */
    public function createUser(UserRequest $request)
    {
        $this->userRepository->store($request->all());

        return redirect('dashboard/users');
    }

    /**
    * saveUser
    * This function is used to save in the database an user
    * @return view
    */
    public function saveUser(EditUserRequest $request, $id)
    {
        $this->userRepository->update($id, $request->all());

        return redirect('dashboard/users');
    }

    /**
    * deleteUser
    * This function is used to delete an user
    * @return view
    */
    public function deleteUser($id)
    {
        $this->userRepository->destroy($id);

        return redirect('dashboard/users');
    }

    /**
    * articles
    * This function is used to display all the articles
    * @return view
    */
    public function articles()
    {
        $articles = $this->articleRepository->all();

        return view('dashboard/articles', compact('articles'));
    }

    /**
    * article
    * This function is used to display the view to edit an article
    * @return view
    */
    public function article()
    {
        return view('dashboard/article');
    }

    /**
    * editArticle
    * This function is used to edit an article
    * @return view
    */
    public function editArticle($id)
    {
        $articles = $this->articleRepository->byNumberLabel($id); 
        if (is_null($articles))
        {
            abort('404');
        }

        return view('dashboard/edit_article', compact('articles'));
    }

    /**
    * createArticle
    * This function is used to create an article
    * @return view
    */
    public function createArticle(ArticleRequest $request)
    {
        $data = $request->all();
        $langs = explode(",", $data["lang_list"]);
        $i = 0;
        $article_number = $this->articleRepository->lastNumberLabel() +1 ;      

        foreach ($langs as $lang) 
        {
            $images = array();

            foreach ($data as $key => $value) 
            {
                if("image".$lang == substr($key,0,7))
                {
                    $images[] = $this->imageRepository->byName($value)["id"];
                    unset($data[$key]);
                }
            }

            $articleData = $this->articleManager->format($data, $lang);
            $articleData["number_label"] = $article_number;

            $id = $this->articleRepository->store($articleData)["id"];

            $articleData = array();
            $articleData["article_id"] = $id;

            foreach ($images as $image)
            {
                $articleData["image_id"] = $image;
                $this->articleImageRepository->store($articleData);
            }
        }
        return redirect('dashboard/articles');
    }

    /**
    * saveArticle
    * This function is used to save in the database an article
    * @return view
    */
    public function saveArticle(EditArticleRequest $request, $id)
    {
        $data = $request->all();
        $images = array();

        foreach ($data as $key => $value) 
        {
            if ("image" == substr($key,0,5))
            {
                $images[] = $this->imageRepository->byName($value)["id"];
                unset($data[$key]);
            }
        }

        $data = $this->articleManager->format($data);
        $this->articleRepository->update($id, $data);

        $data = array();
        $data["article_id"] = $id;
        $articleImages = $this->articleImageRepository->byArticleId($id);

        foreach ($articleImages as $articleImage)
        {
            $articleImage->delete();
        }

        foreach ($images as $image)
        {
            $data["image_id"] = $image;
            $this->articleImageRepository->store($data);
        }

        return redirect('dashboard/articles');
    }

    /**
    * deleteArticle
    * This function is used to delete an article
    * @return view
    */
    public function deleteArticle($id)
    {
        $this->articleRepository->destroy($id);

        return redirect('dashboard/articles');
    }

     /**
    * publishArticle
    * This function is used to publish an article
    * @return view
    */
     public function publishArticle($id)
     {
        $data = array('state' => 1);

        $this->articleRepository->update($id,$data);

        return redirect('dashboard/articles');
    }

       /**
    * draftArticle
    * This function is used to draft an article
    * @return view
    */
       public function draftArticle($id)
       {
        $data = array('state' => 0);

        $this->articleRepository->update($id,$data);

        return redirect('dashboard/articles');
    }

    /**
    * previewArticle
    * This function is used to preview an article
    * @return view
    */
    public function previewArticle($id)
    {
        $article = $this->articleRepository->byId($id);        
        $total = $this->articleRepository->count();

        if (is_null($article))
        {
            abort('404');
        }

        return view('dashboard/preview', compact('article', 'total'));
    }

}