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
						<div class="col-lg-9 col-md-9">
							<div class="header-article">
								<h2>{{ $article->title }}</h2>
								<h3>Last updated on {{ date('F d, Y', strtotime($article->updated_at)) }}</h3>
							</div>
							
							<div class="text-center hidden-lg hidden-md">
								@if ($article->images->isEmpty())
									<img src="{{ asset('images/common/defaultBlog.png') }}" alt="default image">
								@else
									<img src="{{$article->images->first()->path . $article->images->first()->name}}" alt="{{$article->images->first()->name}}">
								@endif
							</div>
							<p class="auto-hgt"> {!! substr($article->content, 0 , 300) . '...' !!} </p>
						</div>	
					</div>
					</a>
				</div>
				
				@endforeach
				<div class="text-center">
					<a class="btn btn-lg btn-default btn-blog" href="{{ route('blog')}}">
						Read all
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

