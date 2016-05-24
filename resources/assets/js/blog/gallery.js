
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

$('#galleryModal .next').click(function()
{
	var image = $('#galleryModal img');
	var id = image.data('id');

	var newImage = $('#gallery-item #' + id);
});

$('#galleryModal .previous').click(function()
{
	var image = $('#galleryModal img');
	var id = image.data('id');
});