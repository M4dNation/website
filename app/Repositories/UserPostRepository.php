<?php 

namespace App\Repositories;

use App\Models\UserPost;

class UserPostRepository extends Repository
{
	public function __construct(UserPost $user_post)
	{
	   $this->model = $user_post;
	}
}