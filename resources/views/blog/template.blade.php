<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    {!! Html::style(elixir('css/lib/libraries.css')) !!}
    {!! Html::favicon('favicon.ico') !!}
    <title>@yield('title')</title>
<body>
	@yield('content')
	{!! Html::script(elixir('js/lib/libraries.js')) !!}
</body>
</html>
