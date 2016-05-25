<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    {!! Html::style(elixir('css/lib/libraries.css')) !!}
    {!! Html::style(elixir('css/blog/blog.css')) !!}
    {!! Html::favicon('favicon.ico') !!}
    <title>@yield('title')</title>
<body>
	@yield('content')
	{!! Html::script(elixir('js/lib/libraries.js')) !!}
	{!! Html::script(elixir('js/blog/blog.js')) !!}
</body>
</html>
