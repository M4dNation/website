<?php 

namespace App\Repositories;

use App\Models\Article;

class ArticleRepository extends Repository
{
    public function __construct(Article $article)
	{
	   $this->model = $article;
	}   

	/**
    * published
    * This function is used in order to get all the articles published.
    * @return {Article}
    */
	public function published($n)
	{
		return $this->model->published($n);
	}

	/**
    * takePublished
    * This function is used in order to get n articles published.
    * @return {Article}
    */
	public function takePublished($n)
	{
		return $this->model->takePublished($n);
	}

	/**
    * countPublished
    * This function is used in order to getthe number of articles published.
    * @return {Article}
    */
	public function countPublished()
	{
		return count($this->model->allPublished());
	}
}