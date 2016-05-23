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
					<div class="gallery-item">
						<img src="https://d1bcl7tdsf48aa.cloudfront.net/images/screenshots/quests2/01.jpg" alt="">
					</div>
					<div class="gallery-item">
						<img src="https://d1bcl7tdsf48aa.cloudfront.net/images/screenshots/quests2/02.jpg" alt="">
					</div>
					<div class="gallery-item">
						<img src="https://d1bcl7tdsf48aa.cloudfront.net/images/screenshots/quests2/03.jpg" alt="">
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
@stop
