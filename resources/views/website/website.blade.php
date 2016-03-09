@extends('website.template')

@section('content')
	@include('website.header')
	@include('website.slideshow')
	<div class="container">	
		@include('website.home')
		@include('website.project')
		@include('website.team')
		@include('website.blog')
		@include('website.contact')
	</div>
	@include('website.footer')
@stop
