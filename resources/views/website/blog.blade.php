<section id="blog" class="section">
<div class="container">			
	<div class="col-lg-6 col-md-6">
		<h1 class="text-center">Blog</h1>
		<h2 class="text-center">{{$last_article->title}}</h2>
		<div class="text-center">
			<img class="mrg-b-20" src="http://lorempicsum.com/futurama/200/200/4" alt="">
			<p class="text-center">
			{{ substr($last_article->content, 0 , 255) . "..."}}
			</p>
			<a class="btn btn-lg btn-primary" href="#">En savoir plus</a>
		</div>
	</div>

