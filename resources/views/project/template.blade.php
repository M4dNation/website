<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="description" content="Yggdrasill is a crowdsourcing platform for players and video game studios." />
    <meta name="author" content="M4dNation" />
	<meta name="copyright" content="All images, names or brands used are property of M4dNation SAS. All rights reserved." />
    {!! Html::style(elixir('css/lib/libraries.css')) !!}
    {!! Html::style(elixir('css/project/project.css')) !!}
    {!! Html::favicon('favicon.ico') !!}
    <title>@yield('title')</title>
<body>
	@yield('content')
	{!! Html::script(elixir('js/lib/libraries.js')) !!}
	{!! Html::script(elixir('js/project/project.js')) !!}
</body>
</html>
