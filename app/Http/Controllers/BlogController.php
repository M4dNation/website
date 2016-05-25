<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;


use App\Repositories\ArticleRepository;

class BlogController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    public function index(Request $request)
    {
        $nbPage = strval(intval(ceil($this->articleRepository->count()/5)));

        if ($request->has("page"))
        {
            if ($request->page > $nbPage)
            {
                Paginator::currentPageResolver(function () use ($nbPage)
                {
                    return $nbPage;
                });
            }
        } 

        $articles = $this->articleRepository->paginate(5);

    	return view('blog/blog', compact('articles'));
    }

    public function showArticle($id)
    {
        $article = $this->articleRepository->byId($id);        
        $total = $this->articleRepository->count();

        if (is_null($article))
        {
            abort('404');
        }

        return view('blog/article', compact('article', 'total'));
    }
}