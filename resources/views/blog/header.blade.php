<nav class="header-container navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		    </button>
		    <div class="logo">
        		<a href="{{ route('home') }}">
          			<img src="{{ asset('images/common/logo_title.png') }}" />
        		</a>
      		</div>
		</div>
		<div id="navbar" class="navbar-collapse collapse menuHeader">
			<ul class="nav navbar-nav navbar-left">
		        <li class="nav-item"><a href="{{ route('home') }}">Home</a></li>
		        <li class="nav-item"><a href="#">Blog</a></li>
      		</ul>
		</div>
	</div>
</nav>