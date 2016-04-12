@extends('website.template')

@section('title')
	M4dNation
@stop

{{ dd($last_article->images)}}
@section('content')
	@include('website.header')			
	@include('website.slideshow')		
	@include('website.home')
	@include('website.project')
	@include('website.team')
	@include('website.blog')
	@include('website.contact')
	@include('website.footer')
@stop
