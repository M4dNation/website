var Application = (function(Application)
{
	Application.url = {};

	return Application;
})(Application || {});

$('.testButton').click(function()
{
	var container = $('#fileManagerModal filemanager-body');
	Application.FileManager.getTree();
});



var Application = Application || {};

Application.FileManager = (function(FileManager)
{
	var _currentUrl = "media";
	var _selectedImages = new Array();
	var _idForm = "";

	FileManager.launch = function(idForm)
	{
		_idForm = idForm;
		Application.FileManager.getTree();
	}

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


	FileManager.emptySelection = function()
	{
		_selectedImages = new Array();
	};


	FileManager.addImages = function()
	{
		$('.selectedImage').remove();
		$('.thumbnails').empty();
		for(i in _selectedImages)
		{
			$('#'+_idForm).append('<input class="selectedImage" name="image' + i + '" type="hidden" value="' + _selectedImages[i] + '"/>');
			$('.thumbnails').append('<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"><img src="' + Application.url.image + _currentUrl + "/" + _selectedImages[i] + '"/></div>');
			
		}
		Application.FileManager.emptySelection();
		$('#fileManagerModal').modal('hide');

	};

	return FileManager;


})(Application.FileManager || {});
//# sourceMappingURL=website.js.map
