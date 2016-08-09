<?php

namespace App\Managers;

use Carbon\Carbon;
use Storage;

use App\Repositories\ImageRepository;

class FileManager 
{
	const PATH = "/storage/app/";
	
	public function __construct(ImageRepository $imageRepository)
	{
		$this->imageRepository = $imageRepository;
	}

	/**
    * getTree
    * This function is used to get folders and files in a folder.
    * @return mixed
    */
	public function getTree($path)
	{
		$directories = Storage::directories($path);
		$files = Storage::files($path);

		$response = array(
			"directories" => $directories, 
			"files" => $files
			);

		return json_encode($response);
	}

	/**
    * mkdir
    * This function is used to create a folder on the server.
    * @return mixed
    */
	public function mkdir($name)
	{
		Storage::makeDirectory($name);

		$response = array("created_folder" => $name);

		return json_encode($response);
	}
	

	/**
    * rmdir
    * This function is used to remove a folder from the server.
    * @return mixed
    */
	public function rmdir($name)
	{
		if (!is_null($name) && $name !== "media")
		{
			Storage::deleteDirectory($name);
			return json_encode(array("deleted_folder" => $name));
		}

		return json_encode(array("deleted_folder" => "none"));
	}


	/**
    * rm
    * This function is used to remove a file from the server.
    * @return mixed
    */
	public function rm($name)
	{
		if (!is_null($name) && $name !== "media")
		{
			$image = $this->imageRepository->byName(basename($name));
			$image->delete();

			Storage::delete($name);

			return json_encode(array("deleted_file" => $name));
		}

		return json_encode(array("deleted_file" => "none"));	
	}

	/**
    * touch
    * This function is used to create a file on the server.
    * @return mixed
    */
	public function touch($file, $path)
	{
		$type = $file->getClientOriginalExtension();

		$data = array();
		$data["name"] = Carbon::now()->timestamp . "." . $type;
		$data["format"] = $type;
		$data["path"] = $path . "/";

		$this->imageRepository->store($data);

		$file->move(base_path() . self::PATH . $path, $data["name"]);

		return json_encode(array("added_file" => $data["name"]));
	}
}