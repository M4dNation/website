/*
|--------------------------------------------------------------------------
| LangEditor JS File
|--------------------------------------------------------------------------
|
| This file defines the behavior of the LangEditor
|
*/

var Application = Application || {};

Application.LangEditor = (function(LangEditor)
{
	var currentLang = "en";
	/**
	* init
	* This function is used in order to initialize the Redactor. 
	* @param void
	*/
	LangEditor.init = function()
	{		
		currentLang = $(".lang-selector option:selected").val();
		if ($("." + currentLang).length===0)
		{
			$(".form-content-box").append("<div class=\"" + currentLang + "\"></div>");
		}
		$(".form-content-box ." + currentLang).hide();
		console.log("test1 :" + $(".lang-selector option:selected").val());
		console.log("test : " + $(".form-content-box ." + currentLang).show());
	}

	

	return LangEditor;

})(Application.LangEditor || {});

