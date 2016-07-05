var Application = Application || {};

Application.FileManager = (function(FileManager)
{
	var _currentUrl = "media";

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

					for(directory in obj.directories)
					{
						fName = Application.FileManager.cleanFolderName(_currentUrl + '/', obj.directories[directory]);
						$('.treeViewer').append('<p onclick="Application.FileManager.down()"><i class="fa fa-folder-o" aria-hidden="true"></i>' + fName + '</p>');
						$('.fileViewer').append('<div onclick="Application.FileManager.down()" oncontextmenu="Application.FileManager.rmdir();" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 text-center"><i class="fa fa-folder-o fa-2x" aria-hidden="true"></i><p class="folderName">' + fName+'</p></div>');	
					}

					for(file in obj.files)
					{
						fPath = Application.FileManager.cleanFolderName(_currentUrl + '/', obj.files[file]);
						$('.fileViewer').append('<img oncontextmenu="Application.FileManager.rm();" src="'+ Application.url.image + obj.files[file] + '"></img>');	
					}

					$('#fileManagerModal').modal('show');
				}	
			});
		}
	};

	FileManager.down = function()
	{
		_currentUrl +=  "/" + $(event.target).parents().children(".folderName").text();
		Application.FileManager.getTree(_currentUrl);
	}

	FileManager.up = function()
	{
		if(_currentUrl !== "media")
		{
			var arrayUrl = _currentUrl.split('/');
			arrayUrl.pop();
			_currentUrl = arrayUrl.join('/');
			Application.FileManager.getTree(_currentUrl);
		}
		console.log(_currentUrl);
	}

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

	FileManager.rm = function()
	{
		event.preventDefault();

		var path = Application.FileManager.cleanFolderName(Application.url.image, $(event.target).attr('src'));
		console.log(path);

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

	FileManager.rename = function()
	{

	};

	FileManager.cleanFolderName = function(cleaner, path)
	{
		return path.replace(cleaner, '');
	};

	return FileManager;

})(Application.FileManager || {});