<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Storage;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Repositories\ImageRepository;
use App\Managers\FileManager;

class AjaxController extends Controller
{
	protected $imageRepository;
	protected $fileManager;

	public function __construct(ImageRepository $imageRepository, FileManager $fileManager)
	{
		$this->imageRepository = $imageRepository;
		$this->fileManager = $fileManager;
	}

	/**
    * index
    * This function is used to verify that the api is running
    * @return mixed
    */
	public function index()
	{
		return json_encode(["website_api" => "running"]);
	}

	/**
    * fm
    * This function is used to verify that the File Manager is running
    * @return mixed
    */
	public function fm()
	{
		return json_encode(["website_fileManager_api" => "running"]);
	}

	/**
    * fm_getTree
    * This function is used to get the folder and the files in a folder.
    * @return mixed
    */
	public function fm_getTree(Request $request)
	{
		$path = $request->path ? $request->path : "media";

		return $this->fileManager->getTree($path);
	}

	/**
    * fm_mkdir
    * This function is used to create a folder on the server.
    * @return mixed
    */
	public function fm_mkdir(Request $request)
	{
		$name = $request->name ? $request->name : "" . Carbon::now()->timestamp;

		return $this->fileManager->mkdir($name);
	}

	/**
    * fm_rmdir
    * This function is used to remove a folder from the server.
    * @return mixed
    */
	public function fm_rmdir(Request $request)
	{
		$name = $request->name ? $request->name : null;
		
		return $this->fileManager->rmdir($name);
	}

	/**
    * fm_rm
    * This function is used to remove a file from the server.
    * @return mixed
    */
	public function fm_rm(Request $request)
	{
		$name = $request->name ? $request->name : null;
		
		return $this->fileManager->rm($name);
	}

	/**
    * fm_touch
    * This function is used to create a file on the server.
    * @return mixed
    */
	public function fm_touch(Request $request)
	{
		if ($request->hasFile('file'))
		{
			if ($request->file('file')->isValid())
			{
				$file = $request->file('file');
				$path = $request->path;

				return $this->fileManager->touch($file, $path);
			}

			return json_encode(array("added_file" => "none"));
		}

		return json_encode(array("added_file" => "none"));	
	}
}