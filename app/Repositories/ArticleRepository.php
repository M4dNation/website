<?php 

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository extends Repository
{
    public function __construct(Article $article)
	{
	   $this->model = $article;
	}   

	public function published($n)
	{
		return $this->model->published($n);
	}

	public function takePublished($n)
	{
		return $this->model->takePublished($n);
	}

	public function countPublished()
	{
		return count($this->model->allPublished());
	}
}