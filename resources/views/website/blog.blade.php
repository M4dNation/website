<section id="blog" class="section">
	<div class="container">
		<div class="row">			
			<div class="col-lg-12 col-md-12">
				<h1>Blog</h1>
				<div class="article-container">	
				<div class="row mrg-b-20">	
						<div class="col-lg-2 text-center">	
							<img src="http://lorempicsum.com/futurama/200/200/4" alt="">
						</div>
						<div class="col-lg-10">	
							<h2>{{ $last_article->title }}</h2>

							<h3>Last updated on {{ date('F d, Y', strtotime($last_article->updated_at)) }}</h3>
						</div>	
				</div>
				<div class="row">	
						<div class="col-lg-10">	
							<p class="auto-hgt"> {!! substr($last_article->content, 0 , 255) . "..." !!} </p>
						</div>
						<div class="col-lg-2">	
							<a class="btn btn-lg btn-primary" href="#">En savoir plus</a>
						</div>	
				</div>
				</div>
			</div>
		</div>
		<div class="row">			
			<div class="col-lg-12 col-md-12">
				<div class="article-container">	
				<div class="row mrg-b-20">	
						<div class="col-lg-2 text-center">	
							<img src="http://lorempicsum.com/futurama/200/200/4" alt="">
						</div>
						<div class="col-lg-10">	
							<h2>{{ $last_article->title }}</h2>

							<h3>Last updated on {{ date('F d, Y', strtotime($last_article->updated_at)) }}</h3>
						</div>	
				</div>
				<div class="row">	
						<div class="col-lg-10">	
							<p class="auto-hgt"> {!! substr($last_article->content, 0 , 255) . "..." !!} </p>
						</div>
						<div class="col-lg-2">	
							<a class="btn btn-lg btn-primary" href="#">En savoir plus</a>
						</div>	
				</div>
				</div>
			</div>
		</div>
		<div class="row">			
			<div class="col-lg-12 col-md-12">
				<div class="article-container">	
				<div class="row mrg-b-20">	
						<div class="col-lg-2 text-center">	
							<img src="http://lorempicsum.com/futurama/200/200/4" alt="">
						</div>
						<div class="col-lg-10">	
							<h2>{{ $last_article->title }}</h2>

							<h3>Last updated on {{ date('F d, Y', strtotime($last_article->updated_at)) }}</h3>
						</div>	
				</div>
				<div class="row">	
						<div class="col-lg-10">	
							<p class="auto-hgt"> {!! substr($last_article->content, 0 , 255) . "..." !!} </p>
						</div>
						<div class="col-lg-2">	
							<a class="btn btn-lg btn-primary" href="#">En savoir plus</a>
						</div>	
				</div>
				</div>
			</div>
		</div>
	</div>
</section>

