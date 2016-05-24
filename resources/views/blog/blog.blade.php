@extends('blog.template')

@section('title')
	Blog
@stop

@section('content')
	@include('blog.header')	
	<div class="container article-container">
		@foreach ($articles as $article)
		<div class="row">
			<div class="title-container">
				<h1>{{ $article->title }}</h1>
				<p class="date">{{ date('F d, Y', strtotime($article->updated_at)) }}</p>
				<a class="top-link" href="#">Back to top</a>
			</div>
			<div class="content-container">
				<p>
					{{ $article->content }}
				</p>
			</div>
			<div class="gallery-container">
				<?php $i = 0; ?>
				@foreach ($article->images as $image)
					<?php $i++ ?>
					<div class="gallery-item">
						<img data-id="{{ $i }}" data-url="{{ asset("" .$image->path . $image->name . "") }}" src="{{ asset("" .$image->path . $image->name . "") }}" data-alt="{{ $image->name }}" alt="{{ $image->name }}">
					</div>
				@endforeach
			</div>
		</div>
		@endforeach
		<div class="navigation-link">
			@if($articles->currentPage()!=1)
				<a class="previous" href="{{ $articles->previousPageUrl() }}">Previous page</a>
			@endif
			@if($articles->hasMorePages())
				<a class="next" href="{{ $articles->nextPageUrl() }}">Next page</a>
			@endif
		</div>
	</div>
	@include('blog.gallery')	
@stop
