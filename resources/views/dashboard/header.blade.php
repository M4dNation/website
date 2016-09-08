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
		        <li class="nav-item"><a href="{{ route('blog') }}">Blog</a></li>
		        <li class="dropdown nav-item">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
		                {{ Config::get('app.locales')[App::getLocale()] }}
		            </a>
		            <ul class="dropdown-menu">
		                @foreach (Config::get('app.locales') as $lang => $language)
		                    @if ($lang != App::getLocale())
		                        <li>
		                            <a href="{{ route('lang.switch', $lang) }}">{!! $language !!}</a>
		                        </li>
		                    @endif
		                @endforeach
		            </ul>
		        </li>
      		</ul>
      		<ul class="nav navbar-nav navbar-right">
      			<li class="nav-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
      			<li class="nav-item"><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
		</div>
		
		
	</div>
</nav>

