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
				<a href="{{ route('blog.article', $article->id) }}" class="article-link">
					<h1>{{ $article->title }}</h1>
				</a>
				<p class="date">{{ date('F d, Y', strtotime($article->updated_at)) }}</p>
				<a class="top-link" href="#">Back to top</a>
			</div>
			<div class="content-container">
				<p>
					{{ $article->content }}
				</p>
			</div>
			<div class="gallery-container" data-article="{{ $article->id }}" data-images="{{ count($article->images) }}">
				<?php $i = 0; $totalImage = count($article->images); ?>
				<div class="row">
					@foreach ($article->images as $image)
						<?php $i++ ?>
						@if ($totalImage == 1)
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 gallery-item">
						@endif
						@if ($totalImage == 2)
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 gallery-item">
						@endif
						@if ($totalImage >= 3)
							@if($i % 3 ==0)
								<?php $totalImage = $totalImage-3 ?>
							@endif
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 gallery-item">
						@endif
							<img data-id="{{ $article->id . '-' . $i }}" data-url="{{ asset("" .$image->path . $image->name . "") }}" src="{{ asset("" .$image->path . $image->name . "") }}" data-alt="{{ $image->name }}" alt="{{ $image->name }}">
						</div>
					@endforeach
				</div>
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
