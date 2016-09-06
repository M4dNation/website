<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Lang;


use App\Repositories\ArticleRepository;

class BlogController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }


     /**
    * index
    * This function is used to display all the articles.
    * @return view
    */

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
        $lang = Lang::getLocale();
        $articles = $this->articleRepository->publishedLocal(5, $lang);

    	return view('blog/blog', compact('articles'));
    }

     /**
    * showArticle
    * This function is used to display one article.
    * @return view
    */

    public function showArticle($id)
    {
        $lang = Lang::getLocale();
        $article = $this->articleRepository->byNumberLabelLocal($id, $lang);        
        $previous = $this->articleRepository->previousArticleLocal($id, $lang)['number_label'];
        $next = $this->articleRepository->nextArticleLocal($id, $lang)['number_label'];

        if (is_null($article) || !$article->isPublished())
        {
            abort('404');
        }

        return view('blog/article', compact('article', 'previous','next'));
    }
}