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
          <img src="{{ asset('images/common/m4dnationlogo2.png') }}" />
        </a>
      </div>
   </div>
    <div id="navbar" class="navbar-collapse collapse menuHeader">
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-item dropdown">
          <a href="{{ route('home') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#company">M4dnation</a></li>
            <li><a href="#project">Yggdrasill</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#blog">Blog</a></li>
          </ul>
        </li>
        <li class="nav-item"><a  href="{{ route('project') }}">Yggdrasill</a></li>
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