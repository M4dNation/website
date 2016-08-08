@extends('website.template')

@section('title')
	M4dNation
@stop

@section('content')
	<div class="body-container">	
		@include('header')
		@include('website.slideshow')		
		@include('website.company')
		@include('website.project')
		@include('website.team')
		@include('website.blog')
		@include('footer')
	</div>
@stop
