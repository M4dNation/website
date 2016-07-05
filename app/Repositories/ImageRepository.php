<?php 

namespace App\Repositories;

use App\Models\Image;

class ImageRepository extends Repository
{
    public function __construct(Image $image)
	{
	   $this->model = $image;
	}

	public function byName($name)
	{
		return $this->model->byName($name);
	}
}