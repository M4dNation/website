@extends('website.template')

@section('content')
	@include('website.header')	
	<div id="fullpage">		
		@include('website.slideshow')		
		@include('website.home')
		@include('website.project')
		@include('website.team')
		@include('website.blog')
		@include('website.contact')
	</div>
@stop
