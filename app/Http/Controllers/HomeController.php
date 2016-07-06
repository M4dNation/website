<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


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
        $articles = $this->articleRepository->takePublished(3);

    	return view('website/website', compact('articles'));
    }
}