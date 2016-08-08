/*
|--------------------------------------------------------------------------
| Homepage JS File
|--------------------------------------------------------------------------
|
| This file defines the behavior of the homepage.
|
*/

//This function enable the scroll when a link on the same page is clicked.
var $root = $('html, body');
$('.nav-item .home-menu a').click(function() 
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

//This function flip the card of a teammember when the mouse is over the card.
$( ".team-item" ).mouseenter(function()
 {
 	$(this).addClass("flip");
});

//This function remove the card flip when the mouse is over the card.
$( ".team-item" ).mouseleave(function()
{
 	$(this).removeClass("flip");
});