<nav class="header-container navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header dashboard-header">
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
		        
		        <li class="nav-item"><a href="{{ route('home') }}">{{ trans('header.home')}}</a></li>
		        <li class="nav-item"><a href="{{ route('project') }}">{{ trans('header.yggdrasill')}}</a></li>
		        <li class="nav-item"><a href="{{ route('blog') }}">{{ trans('header.blog')}}</a></li>
      			
      		</ul>
      		<ul class="nav navbar-nav navbar-right">
      			
      			<li class="nav-item"><a href="{{ route('dashboard') }}">{{ trans('header.dashboard') }}</a></li>
      			<li class="nav-item"><a href="{{ route('logout') }}">{{trans('header.logout')}}</a></li>
            	<li class="nav-item dropdown lang-menu">
		            <a href="#">
		                {!! trans('langs.'.Config::get('app.locales')[App::getLocale()]) !!}
		            </a>
		            <ul class="dropdown-menu">
		                @foreach (Config::get('app.locales') as $lang => $language)
		                    @if ($lang != App::getLocale())
		                        <li class="text-center">
		                            <a href="{{ route('lang.switch', $lang) }}">{!! trans('langs.'.$lang) !!}</a>
		                        </li>
		                    @endif
		                @endforeach
		            </ul>
		        </li>
            </ul>
		</div>
		
		
	</div>
</nav>

