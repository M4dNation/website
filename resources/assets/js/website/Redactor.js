var Application = Application || {};

Application.Redactor = (function(Redactor)
{
	var selection;

	Redactor.init = function() 
	{
	}

	Redactor.toggleView = function()
	{
		if(($("#redactorView").val())==="preview")
		{
			$(".redactorContainer").html($(".redactorContainer").text());
			$(".redactorMenu a").removeClass("disabled");
			$(".redactorMenu input").removeClass("disabled");
		}
		else if(($("#redactorView").val())==="source")
		{
			$(".redactorContainer").text($(".redactorContainer").html());
			$(".redactorMenu a").addClass("disabled");
			$(".redactorMenu input").addClass("disabled");
		}
	}

	Redactor.read= function() 
	{
		$("#redactorInput").val($(".redactorContainer").html());
	}

	Redactor.write = function(command, argument)
	{		
		if(($("#redactorView").val())==="preview")
		{
			if (typeof argument === 'undefined')
			{
				argument = '';
			}
			switch(command)
			{
				case "createLink":
				if(argument == '')
				{
					selection  = Application.Redactor.saveSelection();
					Application.Redactor.insertLink(selection);
				}
				break;
				case "iframe":
				if(argument == '')
				{
					selection  = Application.Redactor.saveSelection();
					Application.Redactor.insertIFrame(selection);
				}
				break;
			}
			document.execCommand(command, false, argument);	
		}
	};

	Redactor.insertLink = function(selection)
	{	
		swal(
		{ 
			title: "Insert a link",
			text: "Write your target below:",
			type: "input",
			showCancelButton: true,
			closeOnConfirm: false,
			animation: "slide-from-top",
			inputPlaceholder: "http://example.com" 
		},
		function(inputValue)
		{
			if (inputValue === false)
			{
				return false;
			} 
			if (inputValue === "")
			{     
				swal.showInputError("You need to write something!");
				return false;
			}
			Application.Redactor.restoreSelection(selection);
			Application.Redactor.write("createLink",inputValue);
			swal("Succes!", "Your link : " + inputValue + " has been added", "success");
		});
	}

	Redactor.insertIFrame = function(selection)
	{	
		swal(
		{ 
			title: "Insert a iFrame",
			text: "Write your target below:",
			type: "input",
			showCancelButton: true,
			closeOnConfirm: false,
			animation: "slide-from-top",
			inputPlaceholder: "https://www.youtube.com/embed/C0DPdy98e4c" 
		},
		function(inputValue)
		{
			if (inputValue === false)
			{
				return false;
			} 
			if (inputValue === "")
			{     
				swal.showInputError("You need to write something!");
				return false;
			}
			argument = '<iframe width="100%" height="500" src="' + inputValue + '" frameborder="0" allowfullscreen></iframe>';
			Application.Redactor.restoreSelection(selection);
			Application.Redactor.write("insertHtml",argument);
			swal("Succes!", "Your iFrame : " + inputValue + " has been added", "success");
		});
	}
	
	Redactor.saveSelection = function()
	{
		if (window.getSelection)
		{
			sel = window.getSelection();
			if (sel.getRangeAt && sel.rangeCount)
			{
				var ranges = [];
				for (var i = 0, len = sel.rangeCount; i < len; ++i)
				{
					ranges.push(sel.getRangeAt(i));
				}
				return ranges;
			}
		} 
		else if (document.selection && document.selection.createRange)
		{
			return document.selection.createRange();
		}
		return null;
	}

	Redactor.restoreSelection = function (savedSel)
	{
		if (savedSel)
		{
			if (window.getSelection)
			{
				sel = window.getSelection();
				sel.removeAllRanges();
				for (var i = 0, len = savedSel.length; i < len; ++i)
				{
					sel.addRange(savedSel[i]);
				}
			} 
			else if (document.selection && savedSel.select)
			{
				savedSel.select();
			}
		}
	}
	return Redactor;

})(Application.Redactor || {});

