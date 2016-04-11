<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset(elixir('css/main.css')) }}">
    <title>@yield('title')</title>
<body>
	@yield('content')
	<script src="{{ asset(elixir('js/main.js')) }}"></script>
</body>
</html>
