<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Lang;
use App\Managers\ArticleManager;

use App\Repositories\ArticleRepository;

class HomeController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
    * index
    * This function is used to display 3 articles
    * @return view
    */
    public function index()
    {
        $lang = Lang::getLocale();
        $articles = $this->articleRepository->takePublishedLocal(3, $lang);
        foreach ($articles as $article)
        {
            $article['local_updated_at'] = ArticleManager::formatDate($article, $lang);
        }
        
    	return view('website/website', compact('articles'));
    }
}