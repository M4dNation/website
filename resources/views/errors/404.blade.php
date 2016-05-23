@extends('errors.template')

@section('title')
	M4dNation - 404 Not Found
@stop

@section('content')
	<div class="errors-container">
		<a href="{{ route('home') }}">
					<img src="{{ asset('images/errors/404.png') }}" alt="">
		</a>	
	</div>

@stop