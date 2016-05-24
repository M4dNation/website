@extends('blog.template')

@section('title')
	Blog
@stop

@section('content')
	@include('blog.header')	
	<div class="container article-container">
		<div class="row">
			<div class="title-container">
				<h1>{{ $article->title }}</h1>
				<p class="date">{{ date('F d, Y', strtotime($article->updated_at)) }}</p>
				<a class="top-link" href="{{ route('blog') }}">All articles</a>
			</div>
			<div class="content-container">
				<p>
					{{ $article->content }}
				</p>
			</div>
			<div class="gallery-container" data-article="{{ $article->id }}" data-images="{{ count($article->images) }}">
				<?php $i = 0; ?>
				@foreach ($article->images as $image)
					<?php $i++ ?>
					<div class="gallery-item">
						<img data-id="{{ $article->id . '-' . $i }}" data-url="{{ asset("" .$image->path . $image->name . "") }}" src="{{ asset("" .$image->path . $image->name . "") }}" data-alt="{{ $image->name }}" alt="{{ $image->name }}">
					</div>
				@endforeach
			</div>
		</div>
		<div class="navigation-link">
			@if ( ($article->id - 1) > 0 )
				<a class="previous" href="{{ route('blog.article',($article->id-1)) }}">Previous article</a>
			@endif
			@if ( ($article->id) < $total)
				<a class="next" href="{{ route('blog.article',($article->id+1)) }}">Next article</a>
			@endif
		</div>
	</div>
	@include('blog.gallery')	
@stop
