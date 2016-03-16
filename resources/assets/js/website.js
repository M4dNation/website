function showSocial(element)
{
	$('.activeSocial').toggleClass('activeSocial');
	$(element).toggleClass('activeSocial');
}

$(document).ready(function() {
    $('#fullpage').fullpage({
				anchors: ['slideAnchor','homeAnchor', 'projectAnchor', 'teamAnchor', 'blogAnchor'],
				scrollingSpeed: 1500,
				menu: '.menuHeader',
    });
});

