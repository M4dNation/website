<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ArticleRepository;

class HomeController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $last_article = $this->articleRepository->lastArticle();

    	return view('website/website', compact('last_article'));
    }

    public function sendContactEmail()
    {

    }
}