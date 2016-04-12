<?php 

namespace App\Repositories;

use App\Models\Tutorial;

class TutorialRepository extends Repository
{
	public function __construct(Tutorial $tutorial)
	{
	   $this->model = $tutorial;
	}
}