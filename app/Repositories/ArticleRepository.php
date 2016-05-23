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
    * user
    * This function is used in order to get the related user. 
    * @return {User}
    */
   
    public function user()
    {
        return $this->model->user;
    }

    /**
    * images
    * This function is used in order to get the article's images.
    * @return {LaravelCollection => Images}
    */
   
    public function images()
    {
        return $this->model->images;
    }

    /**
    * lastArticle
    * This function is used in order to get the latest article. 
    * @return {Article}
    */
   
    public function lastArticle()
    {
        return Article::last();
    }

    /**
     * take
     * This function is used in order to get the n latest article
     * @return  {Article}
     */
    
    public function take($n)
    {
        return Article::take($n);
    }

    /**
     * paginate
     * This function is used to paginate all the articles with $n article by page
     * @return  {Article}
     */

     public function paginate($n)
    {
        return Article::paginate($n);
    }
}