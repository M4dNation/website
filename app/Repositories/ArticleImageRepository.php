<?php 

namespace App\Repositories;

use App\Models\ArticleImage;

class ArticleImageRepository extends Repository
{
	public function __construct(ArticleImage $article_image)
	{
	   $this->model = $article_image;
	}

	/**
    * byArticleId
    * This function is used in order to get all the image related to an article.
    * @return {Images}
    */
	public function byArticleId($id)
	{
		return $this->model->byArticleId($id);
	}
}