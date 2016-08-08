<?php 

namespace App\Repositories;

use App\Models\Image;

class ImageRepository extends Repository
{
    public function __construct(Image $image)
	{
	   $this->model = $image;
	}

	/**
    * byName
    * This function is used in order to get an image by its name.
    * @return {Image}
    */
	public function byName($name)
	{
		return $this->model->byName($name);
	}
}