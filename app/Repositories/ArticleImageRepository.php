<?php 

namespace App\Repositories;

use App\Models\ArticleImage;

class ArticleImageRepository extends Repository
{
	public function __construct(ArticleImage $article_image)
	{
	   $this->model = $article_image;
	}
}