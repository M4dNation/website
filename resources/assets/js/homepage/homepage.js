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

$( ".team-item" ).mouseenter(function() {
 	$(this).addClass("flip");
});

$( ".team-item" ).mouseleave(function() {
 	$(this).removeClass("flip");
});