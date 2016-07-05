<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {!! Html::style(elixir('css/lib/libraries.css')) !!}
    {!! Html::style(elixir('css/dashboard/dashboard.css')) !!}
    {!! Html::style(elixir('css/tools/tools.css')) !!}
    {!! Html::favicon('favicon.ico') !!}
    <title>@yield('title')</title>
<body>
	@yield('content')
	{!! Html::script(elixir('js/lib/libraries.js')) !!}
	{!! Html::script(elixir('js/lib/website.js')) !!}
	<script>
	Application.url = 
	{
		'api'				: "{{ route('api') }}",
		'image'				: "{{ asset('') }}",
		'fm_getTree'		: "{{ route('api.fmtree') }}",
		'fm_mkdir'			: "{{ route('api.fmmkdir')}}",
		'fm_rmdir'			: "{{ route('api.fmrmdir')}}",
		'fm_rm'				: "{{ route('api.fmrm')}}",

	}
	</script>
	@include('tools/filemanager')
</body>
</html>
