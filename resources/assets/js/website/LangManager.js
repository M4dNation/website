/*
|--------------------------------------------------------------------------
| LangEditor JS File
|--------------------------------------------------------------------------
|
| This file defines the behavior of the LangEditor
|
*/

var Application = Application || {};

Application.LangManager = (function(LangManager)
{
	var currentLang = "en";


	LangManager.switchLang = function()
	{		
			console.log("test");
			$("." + currentLang).hide();
			var previousLang = currentLang;
			currentLang = $(".lang-selector option:selected").val();
			$(".current_redactor").val(currentLang);
			$(".current_fileManager").val(currentLang);
			if ($("." + currentLang).length===0)
			{
				$(".lang_list").val($(".lang_list").val() + "," + currentLang);
				var child = "<div class=\"" + currentLang + "\">" + $("." + previousLang).html() + "</div>" ;
				$(".form").append(child);
				$("." + currentLang + " .redactor").attr("id",currentLang);
				$("." + currentLang + " input, ." + currentLang + " textarea").map(function(){
	    			
	    			let currentName = $(this).attr("name");
	    			if(currentName != undefined)
	    			{
	    				currentName = currentName.replace("-" + previousLang, "-" + currentLang);
	    				$(this).attr("name", currentName);
	    			}
				});
			}
			$("." + currentLang).show();
				
	}

	LangManager.initLangEditing = function()
	{		
		var langList= $(".lang_list").val().split(',');
		for(var i in langList)
		{
			console.log(langList[i])
			$("." + langList[i]).hide();			
		}
		$(".en").show();
	}
	
	return LangManager;

})(Application.LangManager || {});

Application.LangManager.initLangEditing();