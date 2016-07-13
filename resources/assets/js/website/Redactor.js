var Application = Application || {};

Application.Redactor = (function(Redactor)
{
	allowedTags = new Array("b","em","u","s","h2","h3","h4","h5","ul","ol","li");

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

	Redactor.write = function(command, argument)
	{		
		if(($("#redactorView").val())==="preview")
		{
			if (typeof argument === 'undefined') {
				argument = '';
			}
			switch(command){
				case "createLink":
				if(argument == '')
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
						Application.Redactor.write("createLink",inputValue);
						swal("Succes!", "Your link : " + inputValue + " has been added", "success");
					});
				}
				break;
				case "iframe":
				command= "insertHtml"
				url = prompt("Quelle est l'adresse du lien ?");
				argument = '<iframe width="100%" height="500" src="' + url + '" frameborder="0" allowfullscreen></iframe>';
				break;
			}
			document.execCommand(command, false, argument);	
		}
		
		
		/*if(allowedTags.indexOf(tags)>=0)
		{
			var start = Application.Redactor.getCaretPosition($(".redactorContainer"));
			console.log(start);
			var end = document.getSelection().anchorOffset;
			console.log(end);
			var text = $(".redactorContainer").html();

			text = text.substring(0,start) + "<" + tags + ">" + text.substring(start,end) + "</" + tags + ">" + text.substring(end,text.length);

			$(".redactorContainer").html(text);
		}
		Application.Redactor.preview();*/
	};

	Redactor.bbCodeToHtml = function(allowedTag)
	{
		var content = $(".redactorContainer").val();

		if(content.indexOf("[" + allowedTag + "]") >= 0)
		{
			var bbCode = "[" + allowedTag + "]";
			var html = "<" + allowedTag + "></" + allowedTag + ">";
			var pos = content.indexOf(bbCode) + bbCode.length;
			$(".redactorContainer").val(content.replace(bbCode ,html));
			Application.Redactor.selectRange($(".redactorContainer"),pos,pos);	
		}

		if(content.indexOf("[/" + allowedTag + "]") >= 0)
		{
			var bbCode = "[/" + allowedTag + "]";
			var html = "</" + allowedTag + ">";
			$(".redactorContainer").val(content.replace(bbCode ,html));
		}
	};


	Redactor.selectRange = function(domElement, start, end)
	{
		if(end === undefined)
		{
			end = start;
		}
		return domElement.each(function() 
		{
			if('selectionStart' in this)
			{
				this.selectionStart = start;
				this.selectionEnd = end;
			} 
			else if(this.setSelectionRange)
			{
				this.setSelectionRange(start, end);
			}
			else if(this.createTextRange)
			{
				var range = this.createTextRange();
				range.collapse(true);
				range.moveEnd('character', end);
				range.moveStart('character', start);
				range.select();
			}
		});
	};




	return Redactor;

})(Application.Redactor || {});

