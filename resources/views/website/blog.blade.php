<section id="blog" class="section">
	<div class="container">
		<div class="row">			
			<div class="col-lg-12 col-md-12">
				<h1>Blog</h1>
				@foreach ($articles as $article)
				<div class="article-container">	
					<a href="{{ route('blog.article', $article->id) }}" class="article-link">
					<div class="row mrg-b-20">	
						<div class="col-lg-3 text-center">	
							<img src="{{$article->images[0]->path . $article->images[0]->name}}" alt="">
						</div>
						<div class="col-lg-9">
							<h2>{{ $article->title }}</h2>

							<h3>Last updated on {{ date('F d, Y', strtotime($article->updated_at)) }}</h3>

							<p class="auto-hgt"> {!! substr($article->content, 0 , 300) . '...' !!} </p>
						</div>	
					</div>
					</a>
				</div>
				
				@endforeach
				<div class="pull-right">
					<a class="btn btn-lg btn-default btn-blog" href="{{ route('blog')}}">
						Read all
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

