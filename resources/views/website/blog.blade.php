<?php
use App\Managers\ArticleManager;
?>

<span id="blog" class="anchor"></span>
<section class="section">
	<div class="container">
		<div class="row">			
			<div class="col-lg-12 col-md-12">
				<h1>Blog</h1>
				@foreach ($articles as $article)
				<div class="article-container">	
					<a href="{{ route('blog.article', $article->id) }}" class="article-link">
						<div class="row mrg-b-20">	
							<div class="col-lg-3 col-md-3 hidden-sm hidden-xs text-center">	
								@if ($article->images->isEmpty())
									<img src="{{ asset('images/common/defaultBlog.png') }}" alt="default image">
								@else
									<img src="{{$article->images->first()->path . $article->images->first()->name}}" alt="{{$article->images->first()->name}}">
								@endif
							</div>
							<div class="col-lg-9 col-md-9 content-article">
								<div class="header-article">
									<h2>{{ $article->title }}</h2>
									<h3>{{ trans('blog.lastUpdated').' '.$article->local_updated_at.' '.trans('blog.by').' '.$article->user->username }}</h3>
								</div>
								<div class="text-center hidden-lg hidden-md">
									@if ($article->images->isEmpty())
										<img src="{{ asset('images/common/defaultBlog.png') }}" alt="default image">
									@else
										<img src="{{$article->images->first()->path . $article->images->first()->name}}" alt="{{$article->images->first()->name}}">
									@endif
								</div>
								<p class="auto-hgt"> {!! str_replace(['<div>','</div>'],'',substr($article->content, 0 , 300)) . '...' !!} </p>
							</div>	
						</div>
					</a>
				</div>
				
				@endforeach
				<div class="text-center">
					<a class="btn btn-lg btn-default btn-blog" href="{{ route('blog') }}">
						{!! trans('website.blogLink') !!}
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

