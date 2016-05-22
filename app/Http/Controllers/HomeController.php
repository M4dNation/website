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

    public function index()
    {
        $articles = $this->articleRepository->take(3);

    	return view('website/website', compact('articles'));
    }
}