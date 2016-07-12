var Application = Application || {};

Application.Redactor = (function(Redactor)
{
	allowedTags = new Array("b","em","u","s","h2","h3","h4","h5","ul","ol","li");

	Redactor.preview = function()
	{
		$(".redactorPreview").html('');
		$(".redactorPreview").html($(".redactorContainer").val());
	}

	Redactor.read = function()
	{
		for(a in allowedTags)
		{
			Application.Redactor.bbCodeToHtml(allowedTags[a]);
		}
		Application.Redactor.preview();
	};

	Redactor.write = function(tags)
	{
		if(allowedTags.indexOf(tags)>=0)
		{
			var start = $(".redactorContainer")[0].selectionStart;
			var end = $(".redactorContainer")[0].selectionEnd;
			var text = $(".redactorContainer").val();

			text = text.substring(0,start) + "<" + tags + ">" + text.substring(start,end) + "</" + tags + ">" + text.substring(end,text.length);

			$(".redactorContainer").val(text);
		}
		Application.Redactor.preview();
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

