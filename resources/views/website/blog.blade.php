<section id="blog" class="section">
	<div class="container">
		<div class="row">			
			<div class="col-lg-12 col-md-12">
				<h1>Blog</h1>
				@foreach ($articles as $article)
				<div class="article-container">	
					<a href="#" class="article-link">
					<div class="row mrg-b-20">	
						<div class="col-lg-3 text-center">	
							<img src="http://lorempicsum.com/futurama/200/200/4" alt="">
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
			</div>
		</div>
	</div>
</section>

