<?php

namespace App\Repositories;

use App\Models\Thread;

class ThreadRepository extends Repository
{

  public function __construct(Thread $thread)
	{
	   $this->model = $thread;
	}

}
