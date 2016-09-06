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
	/**
	* init
	* This function is used in order to initialize the Redactor. 
	* @param void
	*/
	LangManager.switchLang = function(container)
	{		
		$("." + currentLang).hide();
		var previousLang = currentLang;
		currentLang = $(".lang-selector option:selected").val();
		$(".current_redactor").val(currentLang);
		$(".current_fileManager").val(currentLang);
		if ($("." + currentLang).length===0)
		{
			$(".lang_list").val($(".lang_list").val() + "," + currentLang);
			var child = "<div class=\"" + currentLang + "\">" + $("." + previousLang).html() + "</div>" ;
			$("." + container).append(child);
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

	return LangManager;

})(Application.LangManager || {});

