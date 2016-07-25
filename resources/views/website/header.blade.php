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
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item dropdown">
          <a href="{{ route('home') }}" >Home</a>
          <ul class="dropdown-menu">
            <li><a href="{{(Request::is('/') ?  "#company" : route('home')."#company")}}">M4dnation</a></li>
            <li><a href="{{(Request::is('/') ?  "#project" : route('home')."#project")}}">Yggdrasill</a></li>
            <li><a href="{{(Request::is('/') ?  "#team" : route('home')."team")}}">Team</a></li>
            <li><a href="{{(Request::is('/') ?  "#blog" : route('home')."blog")}}">Blog</a></li>
          </ul>
        </li>
         <li class="nav-item dropdown">
          <a href="{{ route('project') }}">Yggdrasill</a>
          <ul class="dropdown-menu">
            <li><a href="{{(Request::is('yggdrasill') ?  "#yggdrasill" : route('project')."#yggdrasill")}}">Presentation</a></li>
            <li><a href="{{(Request::is('yggdrasill') ?  "#why" : route('project')."#why")}}">Why?</a></li>
            <li><a href="{{(Request::is('yggdrasill') ?  "#how" : route('project')."#how")}}">How it works</a></li>
            <li><a href="{{(Request::is('yggdrasill') ?  "#what" : route('project')."#what")}}">What next?</a></li>
          </ul>
        </li>
        <li class="nav-item"><a  href="{{ route('blog') }}">Blog</a></li>	
        <li class="hidden-xs hidden-sm">
          <ul class="navbar-social">
            <li id="facebook">
                <a target="_blank" rel="nofollow" href="https://www.facebook.com/M4dNationOfficial/"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
            </li>
            <li id="twitter">
                <a target="_blank" rel="nofollow" href="https://twitter.com/M4dNation"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
            </li>
          </ul>
        </li>
      </ul>			
 </div>
</div>
</nav>