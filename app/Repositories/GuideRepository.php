<?php 

namespace App\Repositories;

use App\Models\Guide;

class GuideRepository extends Repository
{
	public function __construct(Guide $guide)
	{
	   $this->model = $guide;
	}
}