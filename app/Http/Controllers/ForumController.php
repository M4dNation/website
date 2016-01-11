<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CategoryRepository;
use App\Repositories\ThreadRepository;
use App\Repositories\PostRepository;

class ForumController extends Controller
{
    protected $categoryRepository;
    protected $threadRepository;
    protected $postRepository;

    public function __construct(CategoryRepository $c, ThreadRepository $t, PostRepository $p)
    {
        $this->categoryRepository = $c;
        $this->threadRepository = $t;
        $this->postRepository = $p;
    }

    public function index()
    {
        $categories = $this->categoryRepository->allWithFirstThread();

        return view('forum/index', compact('categories'));
    }

    public function getThread($category, $thread)
    {

    }


    public function getThreads($category)
    {

    }

}
