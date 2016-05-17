@extends('blog.template')

@section('content')
	@include('website.header')	
	<div class="container">
		<div class="row">
			<div class="title-container">
				<p class="date">Le 18/03/2016</p>
				<h1>Bienvenue sur le nouveau site</h1>
				<p class="author">Rémi</p>
			</div>
			<div class="content-container">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vitae est et ipsum mollis faucibus. Praesent luctus urna vitae tincidunt tristique. Quisque elit dui, vehicula eu nisl in, aliquet tincidunt risus. Sed id volutpat lacus, sit amet lacinia metus. Morbi maximus, ante porta finibus semper, velit orci eleifend augue, nec dignissim ex quam in nunc. Ut dictum feugiat ante, eu vestibulum metus viverra eget. Fusce commodo metus quis turpis suscipit, ac ultricies massa dictum. Nunc interdum lectus in purus malesuada pulvinar. Donec dictum sit amet lectus a maximus. Phasellus pretium massa a mi luctus laoreet. Nullam nec neque rhoncus, placerat arcu nec, blandit ex. Aliquam a orci placerat, condimentum nunc sit amet, euismod eros. Aliquam porta mauris eget dolor lacinia tempus ut vel urna. Donec nec augue viverra, rutrum sapien sit amet, molestie turpis</p>
			</div>
			<div class="gallery-container">
				<div class="row">
					<div class="col-lg-4 gallery">
						<img src="../resources/assets/image/logoM4dNation.png" alt="">
					</div>
					<div class="col-lg-4 gallery">
						<img src="../resources/assets/image/logoM4dNation.png" alt="">
					</div>
					<div class="col-lg-4 gallery">
						<img src="../resources/assets/image/logoM4dNation.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>		
		
	
@stop
