/*
|--------------------------------------------------------------------------
| Project JS File
|--------------------------------------------------------------------------
|
| This file defines the behavior of the project page.
|
*/

//This function enable the scroll when a link on the same page is clicked.
var $root = $('html, body');
$('.nav-item .yggdrasill-menu a').click(function() 
{
    var href = $.attr(this, 'href');
    
    $root.animate(
    {
        scrollTop: $(href).offset().top
    }, 500, function () 
    {
        window.location.hash = href;
    });
    
    return false;
});