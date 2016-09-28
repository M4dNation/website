/*
|--------------------------------------------------------------------------
| Redactor JS File
|--------------------------------------------------------------------------
|
| This file defines the behavior of the Redactor
|
*/

var Application = Application || {};

Application.Redactor = (function(Redactor)
{
	var selection;

	/**
	* init
	* This function is used in order to initialize the Redactor. 
	* @param void
	*/
	Redactor.init = function()
	{
		$(".redactor").each(function()
		{
			var lang = $(this).attr("id");
			var content = $(this).html();

			var redactorHtml = "<div class=\"redactorMenu\">";
			redactorHtml +=  "<select onchange=\"Application.Redactor.toggleView()\" class=\"redactorView\">";
			redactorHtml +=  	"<option value=\"preview\" selected>Preview</option> ";
			redactorHtml +=  	"<option value=\"source\">Source</option>";
			redactorHtml +=  "</select>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('bold');\" ><i class=\"fa fa-bold\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('italic');\" ><i class=\"fa fa-italic\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('underline');\" ><i class=\"fa fa-underline\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('strikeThrough');\" ><i class=\"fa fa-strikethrough\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('insertunorderedlist');\" ><i class=\"fa fa-list-ul\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('insertorderedlist');\" ><i class=\"fa fa-list-ol\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('createLink');\" ><i class=\"fa fa-link\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('iframe', '');\" ><i class=\"fa fa-video-camera\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('formatBlock', '<h2>');\" >h1</button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('formatBlock', '<h3>');\" >h2</button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('formatBlock', '<h4>');\" >h3</button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('formatBlock', '<h5>');\" >h4</button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('justifyCenter');\" ><i class=\"fa fa-align-center\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('justifyLeft');\" ><i class=\"fa fa-align-left\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('justifyRight');\" ><i class=\"fa fa-align-right\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('justifyFull');\" ><i class=\"fa fa-align-justify\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('superscript');\" ><i class=\"fa fa-superscript\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('subscript');\" ><i class=\"fa fa-subscript\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<input type=\"color\" value=\"#000000\" onChange=\"Application.Redactor.write('forecolor',this.value);\"/>";
			redactorHtml +=  "<input type=\"color\" value=\"#ffffff\" onChange=\"Application.Redactor.write('backColor',this.value);\"/>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('undo');\" ><i class=\"fa fa-undo\" aria-hidden=\"true\"></i></button>";
			redactorHtml +=  "<button type=\"button\" onclick=\"Application.Redactor.write('redo');\" ><i class=\"fa fa-repeat\" aria-hidden=\"true\"></i></button>";	
			redactorHtml +=  "</div>";
			redactorHtml +=  "<div contenteditable=\"true\" onKeyUp=\"Application.Redactor.read();\" onChange=\"Application.Redactor.read();\"   required=\"\" class=\"form-control redactorContainer\">" + content + "</div>";
			$(this).html(redactorHtml);	
			$(this).append("<textarea class=\"hidden redactorInput\" name=\"content-" + lang  + "\" cols=\"30\" rows=\"10\">" + $("." + lang + " .redactorContainer").html()  + "</textarea>");		
			
		});	
	}

	/**
	* toggleView
	* This function is used in order to switch between the preview view and the source view. 
	* @param void
	*/

	Redactor.toggleView = function()
	{
		var currentRedactor = $(".current_redactor").val();
		if (($(".redactor#" + currentRedactor + " .redactorView").val())==="preview")
		{
			$(".redactor#" + currentRedactor + " .redactorContainer").html($(".redactor#" + currentRedactor + " .redactorContainer").text());
			$(".redactor#" + currentRedactor + " .redactorMenu button").removeClass("disabled");
			$(".redactor#" + currentRedactor + " .redactorMenu input").removeClass("disabled");
			$(".redactor#" + currentRedactor + " .redactorInput").val($(".redactor#" + currentRedactor + " .redactorContainer").html());
		}
		else if(($(".redactor#" + currentRedactor + " .redactorView").val())==="source")
		{
			$(".redactor#" + currentRedactor + " .redactorContainer").text($(".redactor#" + currentRedactor + " .redactorContainer").html());
			$(".redactor#" + currentRedactor + " .redactorMenu button").addClass("disabled");
			$(".redactor#" + currentRedactor + " .redactorMenu input").addClass("disabled");
		}
	};

	/**
	* read
	* This function is used in order to apply style on the text
	* @param void
	*/
	Redactor.read= function() 
	{
		var currentRedactor = $(".current_redactor").val();
		if (($(".redactor#" + currentRedactor + " .redactorView").val())==="preview")
		{ 
			$(".redactor#" + currentRedactor + " .redactorInput").val($(".redactor#" + currentRedactor + " .redactorContainer").html());
		}
		else  if (($(".redactor#" + currentRedactor + " .redactorView").val())==="source")
		{
			$(".redactor#" + currentRedactor + " .redactorInput").val($(".redactor#" + currentRedactor + " .redactorContainer").text());
		}
	};

	/**
	* write
	* This function is used in order to apply style when a button is clicked.
	* @param {String} [command] the type of the style applied
	* {String} [argument] the value of the style applied
	*/
	Redactor.write = function(command, argument)
	{		
		var currentRedactor = $(".current_redactor").val();
		if (($(".redactor#" + currentRedactor + " .redactorView").val())==="preview")
		{
			if (typeof argument === 'undefined')
			{
				argument = '';
			}
			switch(command)
			{
				case "createLink":
				if (argument == '')
				{
					selection  = Application.Redactor.saveSelection();
					Application.Redactor.insertLink(selection);
				}
				break;
				case "iframe":
				if (argument == '')
				{
					selection  = Application.Redactor.saveSelection();
					Application.Redactor.insertIFrame(selection);
				}
				break;
			}
			document.execCommand(command, false, argument);	
			Application.Redactor.read();
		}
	};

	/**
	* insertLink
	* This function is used to insert a link in the text.
	* @param {String} [Selection] selection of the text where link will be inserted.
	*/
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
	};

	/**
	* insertIFrame
	* This function is used to insert an IFrame in the text.
	* @param {String} [Selection] selection of the text where link will be inserted.
	*/
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
	};

	/**
	* saveSelection
	* This function is used to get the current selection.
	* @param void
	*/
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
	};

	/**
	* restoreSelection
	* This function is used to restore a saved selection.
	* @param {String} [savedSel] The saved selection.
	*/
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
	};


	return Redactor;

})(Application.Redactor || {});

Application.Redactor.init();
