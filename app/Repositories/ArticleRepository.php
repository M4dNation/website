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
    * published
    * This function is used in order to get all the articles published.
    * @return {Article}
    */
	public function publishedLocal($n, $lang)
	{
		return $this->model->publishedLocal($n, $lang);
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
    * takePublishedLocal
    * This function is used in order to get n articles published in the local language.
    * @return {Article}
    */
	public function takePublishedLocal($n, $lang)
	{
		return $this->model->takePublishedLocal($n, $lang);
	}

	/**
    * countPublished
    * This function is used in order to get the number of articles published.
    * @return {Article}
    */
	public function countPublished()
	{
		return count($this->model->allPublished());
	}

	/**
    * countPublishedLocal
    * This function is used in order to get the number of articles published in your current language.
    * @return {Article}
    */
	public function countPublishedLocal($lang)
	{
		return count($this->model->allPublishedLocal($lang));
	}

	/**
    * clastNumberLabel
    * This function is used in order to getthe number of articles published.
    * @return {Article}
    */
	public function lastNumberLabel()
	{
		return $this->model->lastNumberLabel();
	}

	/**
    * byNumberLabelLocal
    * This function is used in order to get all the articles published.
    * @return {Article}
    */
	public function byNumberLabel($numberLabel)
	{
		return $this->model->byNumberLabel($numberLabel);
	}

	/**
    * byNumberLabelLocal
    * This function is used in order to get all the articles published.
    * @return {Article}
    */
	public function byNumberLabelLocal($numberLabel, $lang)
	{
		return $this->model->byNumberLabelLocal($numberLabel, $lang);
	}

	/**
    * previousArticleLocal
    * This function is used in order to get all the articles published.
    * @return {Article}
    */
	public function previousArticleLocal($numberLabel, $lang)
	{
		return $this->model->previousArticleLocal($numberLabel, $lang);
	}

	/**
    * nextArticleLocal
    * This function is used in order to get all the articles published.
    * @return {Article}
    */
	public function nextArticleLocal($numberLabel, $lang)
	{
		return $this->model->nextArticleLocal($numberLabel, $lang);
	}

	/**
    * publish
    * This function is used in order to publish article
    * @return {Article}
    */
	public function publish($number_label)
	{
		return $this->model->publish($number_label);
	}

	/**
    * draft
    * This function is used in order to draft article
    * @return {Article}
    */
	public function draft($number_label)
	{
		return $this->model->draft($number_label);
	}
}