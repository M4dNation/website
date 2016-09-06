/*
|--------------------------------------------------------------------------
| File Manager JS File
|--------------------------------------------------------------------------
|
| This file defines the behavior of the File Manager
|
*/

var Application = Application || {};

Application.FileManager = (function(FileManager)
{
	var _currentUrl = "media";
	var _selectedImages = new Array();
	var _idForm = "";

	
	/**
	* launch
	* This function is used in order to launch the File Manager. 
	* @param {int} [idForm] Id of the form where the File Manager will be used.
	*/
	FileManager.launch = function(idForm)
	{
		_idForm = idForm;
		Application.FileManager.getTree();
	}

	/**
	* getTree
	* This function is used to get all the file and the folder of a directory;
	* @param void
	*/
	FileManager.getTree = function()
	{
		var path = _currentUrl;
		if ((/^media/).test(path))
		{
			$('.treeViewer').empty();
			$('.fileViewer').empty();
			$.when($.ajax(
			{
				url: Application.url.fm_getTree,
				type: "GET",
				datatype: "json",
				data: "path=" + path,
			})).then(function(data, status)
			{
				if (data !== undefined)
				{
					var obj = $.parseJSON(data);
					var fName, fPath;
					var htmlString ="";
					
					for(directory in obj.directories)
					{
						
						fName = Application.FileManager.cleanFolderName(_currentUrl + '/', obj.directories[directory]);
						htmlString += '<div onclick="Application.FileManager.down()" oncontextmenu="Application.FileManager.rmdir();" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center"><i class="fa fa-folder-o fa-2x" aria-hidden="true"></i><p class="folderName">' + fName+'</p></div>';	
					}

					htmlString +='<div class="row">';
					for(file in obj.files)
					{
						if(file % 4 === 0 && file !== 0)
						{
							htmlString +='</div><div class="row">';
						}

						fPath = Application.FileManager.cleanFolderName(_currentUrl + '/', obj.files[file]);
						htmlString +='<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"><img onclick="Application.FileManager.toggleSelect();" oncontextmenu="Application.FileManager.rm();" src="'+ Application.url.image + obj.files[file] + '"></img></div>';	
					}
					htmlString +='</div>';
					$('.fileViewer').append(htmlString);
					$('#fileManagerModal').modal('show');
				}	
			});
		}
	};

	/**
	* down
	* This function is used to enter in a folder and display the subfolders and the files.
	* @param void
	*/
	FileManager.down = function()
	{
		_currentUrl +=  "/" + $(event.target).parents().children(".folderName").text();
		$("#pathInput").attr("value",_currentUrl);
		Application.FileManager.getTree(_currentUrl);
	}

	/**
	* up
	* This function is used to return to the parent directory.
	* @param void
	*/
	FileManager.up = function()
	{
		if(_currentUrl !== "media")
		{
			var arrayUrl = _currentUrl.split('/');
			arrayUrl.pop();
			_currentUrl = arrayUrl.join('/');
			$("#pathInput").attr("value",_currentUrl);
			Application.FileManager.getTree(_currentUrl);
		}
	}

	/**
	* mkdir
	* This function is used to create a folder.
	* Due to display issues of a modal in a modal, the input for the name of the file must be displayed in the parent modal
	* @param void
	*/
	FileManager.mkdir = function()
	{
		var nameFolder = $('#nameFolder').val();
		if(nameFolder === "")
		{
			swal
			({
				title: "Failed!",
				text: "You have to enter a name for your new folder.",
				type: "error",
			});	
		}
		else
		{
			var path = _currentUrl + '/' +nameFolder;
			swal(
			{
				title: "Are you sure?",
				text: "The folder "+ nameFolder + " will be created.",
				type: "info",
				showCancelButton: true,
				confirmButtonColor: "#DD6B55",
				confirmButtonText: "Yes, create it!",
				closeOnConfirm: false 
			},
			function()
			{
				$.when($.ajax(
				{
					url: Application.url.fm_mkdir,
					type: "GET",
					datatype: "json",
					data: "name=" + path,
				})).then(function(data, status)
				{
					Application.FileManager.getTree(_currentUrl);
					swal("Success", "Folder " + nameFolder + " has been created.", "success"); 
				});						
			}); 
		}
	};

	/**
	* rmdir
	* This function is used to delete a folder.
	* @param void
	*/
	FileManager.rmdir = function()
	{
		event.preventDefault();

		var folderName = $(event.target).parents().children(".folderName").text();
		var path = _currentUrl + "/" + folderName;

		swal(
		{
			title: "Are you sure?",
			text: "You will not be able to recover this folder!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			closeOnConfirm: false 
		},
		function()
		{
			$.when($.ajax(
			{
				url: Application.url.fm_rmdir,
				type: "GET",
				datatype: "json",
				data: "name=" + path,
			})).then(function(data, status)
			{
				Application.FileManager.getTree(_currentUrl);
				swal("Deleted!", "Folder " + folderName + " has been deleted.", "success"); 
			});	
		});
	};

	/**
	* rm
	* This function is used to delete a file.
	* @param void
	*/
	FileManager.rm = function()
	{
		event.preventDefault();

		var path = Application.FileManager.cleanFolderName(Application.url.image, $(event.target).attr('src'));

		swal(
		{
			title: "Are you sure?",
			text: "You will not be able to recover this image!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			closeOnConfirm: false 
		},
		function()
		{
			$.when($.ajax(
			{
				url: Application.url.fm_rm,
				type: "GET",
				datatype: "json",
				data: "name=" + path,
			})).then(function(data, status)
			{
				Application.FileManager.getTree(_currentUrl);
				swal("Deleted!", "Image " + Application.FileManager.cleanFolderName(_currentUrl + '/', path) + " has been deleted.", "success"); 
			});	
		});
	};

	/**
	* cleanFolderName
	* This function is used to get the name of the folder without the path.
	* @param {String} [cleaner] The string to remove from the name
	* {String} [path] The path of the file
	*/
	FileManager.cleanFolderName = function(cleaner, path)
	{
		return path.replace(cleaner, '');
	};

	/**
	* toggleSelect
	* This function is used to select files to insert in the form.
	* @param void
	*/
	FileManager.toggleSelect = function()
	{
		var image = Application.FileManager.cleanFolderName(Application.url.image + _currentUrl + "/", $(event.target).attr('src'));

		if(_selectedImages.indexOf(image)<0)
		{
			_selectedImages.push(image);
			 $(event.target).addClass("selected");
		}
		else
		{
			_selectedImages.pop(image);
			$(event.target).removeClass("selected");
		} 
	};

	/**
	* emptySelection
	* This function is used to empty the current selection.
	* @param {String} [cleaner] The string to remove from the name
	* {String} [path] The path of the file
	*/
	FileManager.emptySelection = function()
	{
		_selectedImages = new Array();
	};

	/**
	* addImages
	* This function is used to add images on the server.
	* @param void
	*/
	FileManager.addImages = function()
	{
		var currentFileManager = $('.current_fileManager').val();
		$('.' + currentFileManager + ' .selectedImage').remove();
		$('.' + currentFileManager + ' .thumbnails').empty();
		for(i in _selectedImages)
		{
			$('#'+_idForm + ' .' + currentFileManager).append('<input class="selectedImage" name="image' + currentFileManager + i + '" type="hidden" value="' + _selectedImages[i] + '"/>');
			$('.' + currentFileManager + ' .thumbnails').append('<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img src="' + Application.url.image + _currentUrl + "/" + _selectedImages[i] + '"/></div>');
			
		}
		Application.FileManager.emptySelection();
		$('#fileManagerModal').modal('hide');

	};

	return FileManager;


})(Application.FileManager || {});