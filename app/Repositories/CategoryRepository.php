<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository
{
    public function __construct(Category $category)
	{
	   $this->model = $category;
       
	}

    public function allWithLastThread()
    {
        return $this->model->allWithLastThread();
    }

    public function allWithFirstThread()
    {
        return $this->model->allWithFirstThread();
    }

    public function withLastThread()
    {
        return $this->model->withLastThread();
    }
}
