<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{

  public function __construct(USer $user)
	{
	   $this->model = $user;
	}

}
