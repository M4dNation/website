<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Storage;
use App\Http\Requests;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
	public function __construct()
	{

	}

	public function index()
	{
		return json_encode(["website_api" => "running"]);
	}

	public function fm()
	{

	}

	public function fm_getTree(Request $request)
	{
		$path = $request->path ? $request->path : "media";

		$directories = Storage::directories($path);
		$files = Storage::files($path);

		$response = array(
			"directories" => $directories, 
			"files" => $files
		);

		return json_encode($response);
	}

	public function fm_mkdir(Request $request)
	{
		$name = $request->name ? $request->name : "" . Carbon::now()->timestamp;
		Storage::makeDirectory($name);

		$response = array("created_folder" => $name);

		return json_encode($response);
	}

	public function fm_rmdir(Request $request)
	{
		$name = $request->name ? $request->name : null;
		
		if (!is_null($name) && $name !== "media")
		{
			Storage::deleteDirectory($name);
		}
			
		return json_encode(array("deleted_folder" => $name));
	}

	public function fm_rm(Request $request)
	{
		$name = $request->name ? $request->name : null;
		
		if (!is_null($name) && $name !== "media")
		{
			Storage::delete($name);
		}
			
		return json_encode(array("deleted_file" => $name));
	}

	public function fm_touch(Request $request)
	{
		if ($request->hasFile('file'))
		{
			if ($request->file('file')->isValid())
			{
				$file = $request->file('file');
				$type = $file->getClientOriginalExtension();
				$file->move(base_path()."/storage/app/media/images/blog/", Carbon::now()->timestamp . "." . $type);
				return;
			}
			return ;
		}
		return;	
	}
}