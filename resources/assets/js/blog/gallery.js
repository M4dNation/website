/*
|--------------------------------------------------------------------------
| Gallery JS File
|--------------------------------------------------------------------------
|
| This file defines the behavior of the gallery.
|
*/

//This function opens the gallery
$('.gallery-item img').click(function()
{
	var url = $(this).data('url');
	var alt = $(this).data('alt');
	var id = $(this).data('id');

	var image = $('#galleryModal img');
	var title = $('#galleryModal .modal-title');

	title.text(alt);
	image.attr('src', url);
	image.attr('alt', alt);
	image.data('id', id);
	$('#galleryModal').modal('toggle');
});

//This function get the next image of the gallery
$('#galleryModal .next').click(function()
{
	var image = $('#galleryModal img');
	var id = image.data('id');
	var articleId = id.split("-")[0];
	var imageId = id.split("-")[1];
	imageId = parseInt(imageId,10);

	var newImage = $('.gallery-item img[data-id="'+ articleId + '-' + (imageId+1) +'"]');
	var url = newImage.attr('src');

	if (url === undefined)
	{
		newImage = $('.gallery-item img[data-id="'+ articleId + '-' + (1) +'"]');
	}

	url = newImage.attr('src');
	var alt = newImage.attr('alt');
	id = newImage.data('id');
	var title = $('#galleryModal .modal-title');

	title.text(alt);
	image.attr('src', url);
	image.attr('alt', alt);
	image.data('id', id);
});

//This function get the previous image of the gallery
$('#galleryModal .previous').click(function()
{
	var image = $('#galleryModal img');
	var id = image.data('id');
	var articleId = id.split("-")[0];
	var imageId = id.split("-")[1];
	imageId = parseInt(imageId,10);

	var newImage = $('.gallery-item img[data-id="'+ articleId + '-' + (imageId-1) +'"]');
	var url = newImage.attr('src');
	var totalImage=$('.gallery-container[data-article="'+ articleId+'"]').data('images');

	if (url === undefined)
	{
		newImage = $('.gallery-item img[data-id="'+ articleId + '-' + totalImage +'"]');
	}

	url = newImage.attr('src');
	var alt = newImage.attr('alt');
	id = newImage.data('id');
	var title = $('#galleryModal .modal-title');

	title.text(alt);
	image.attr('src', url);
	image.attr('alt', alt);
	image.data('id', id);
});