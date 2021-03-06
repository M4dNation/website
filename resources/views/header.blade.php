<nav class="header-container navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse">
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
        <div id="navbar" class="menuHeader">  
            <ul class="nav navbar-nav navbar-right">
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
            <ul id="collapse" class="nav navbar-nav navbar-right navbar-collapse collapse">
                <li class="nav-item dropdown">
                    <a href="{{ route('home') }}" >{{ trans('header.home') }}</a>
                    <ul class="dropdown-menu home-menu hidden-xs hidden-sm">
                        <li><a href="{{(Request::is('/') ?  "#company" : route('home')."#company")}}">{{ trans('header.home_company') }}</a></li>
                        <li><a href="{{(Request::is('/') ?  "#project" : route('home')."#project")}}">{{ trans('header.home_project') }}</a></li>
                        <li><a href="{{(Request::is('/') ?  "#team" : route('home')."#team")}}">{{ trans('header.home_team') }}</a></li>
                        <li><a href="{{(Request::is('/') ?  "#blog" : route('home')."#blog")}}">{{ trans('header.home_blog') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                  <a href="{{ route('project') }}">{{ trans('header.yggdrasill') }}</a>
                  <ul class="dropdown-menu yggdrasill-menu hidden-xs hidden-sm">
                        <li><a href="{{(Request::is('yggdrasill') ?  "#yggdrasill" : route('project')."#yggdrasill")}}">{{ trans('header.yggdrasill_presentation') }}</a></li>
                        <li><a href="{{(Request::is('yggdrasill') ?  "#why" : route('project')."#why")}}">{{ trans('header.yggdrasill_why') }}</a></li>
                        <li><a href="{{(Request::is('yggdrasill') ?  "#how" : route('project')."#how")}}">{{ trans('header.yggdrasill_how') }}</a></li>
                        <li><a href="{{(Request::is('yggdrasill') ?  "#what" : route('project')."#what")}}">{{ trans('header.yggdrasill_what') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a  href="{{ route('blog') }}">{{ trans('header.blog') }}</a></li>	
                <li class="hidden-xs hidden-sm">
                    <ul class="navbar-social">
                        <li id="facebook">
                            <a target="_blank" rel="nofollow" href="https://www.facebook.com/M4dNationOfficial/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        </li>
                        <li id="twitter">
                            <a target="_blank" rel="nofollow" href="https://twitter.com/M4dNation"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                        </li>
                        <li id="instagram">
                            <a target="_blank" rel="nofollow" href="https://www.instagram.com/M4dnation/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </li>
            </ul>
            	
        </div>
    </div>
</nav>