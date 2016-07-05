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


