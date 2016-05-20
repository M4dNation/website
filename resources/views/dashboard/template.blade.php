<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset(elixir('css/lib/libraries.css')) }}">
    <link rel="stylesheet" href="{{ asset(elixir('css/dashboard/dashboard.css')) }}">
    {!! Html::favicon('favicon.ico') !!}
    <title>@yield('title')</title>
<body>
	@yield('content')
	<script src="{{ asset(elixir('js/lib/libraries.js')) }}"></script>
</body>
</html>
