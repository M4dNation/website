<section id="blog" class="section">
	<div class="container">
		<div class="row">			
			<div class="col-lg-12 col-md-12">
				<h1>Blog</h1>
				<div class="text-center">
					<img class="mrg-b-20" src="http://lorempicsum.com/futurama/200/200/4" alt="">
					<h2 class="text-center">{{ $last_article->title }}</h2>
					<p class="auto-hgt"> {!! substr($last_article->content, 0 , 255) . "..." !!} </p>
					<a class="btn btn-lg btn-primary" href="#">En savoir plus</a>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

