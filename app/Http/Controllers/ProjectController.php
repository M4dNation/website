<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function __construct()
    {
    }

    /**
    * index
    * This function is used to display 3 articles
    * @return view
    */
    public function index()
    {
    	return view('project/project');
    }
}