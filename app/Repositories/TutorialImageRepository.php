<?php 

namespace App\Repositories;

use App\Models\TutorialImage;

class TutorialImageRepository extends Repository
{
	public function __construct(TutorialImage $tutorial_image)
	{
	   $this->model = $tutorial_image;
	}
}