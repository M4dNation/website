<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;


use App\Repositories\ArticleRepository;

class BlogController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index()
    {
        $articles = $this->articleRepository->paginate(5);

        if ($articles->currentPage() > $articles->lastPage())
        {
            abort('404');
        }

    	return view('blog/blog', compact('articles'));
    }

    public function showArticle($id)
    {
        $article = $this->articleRepository->byId($id);        
        $total = count($this->articleRepository->all());

        if ($article === null)
        {
            abort('404');
        }

        return view('blog/article', compact('article', 'total'));
    }
}