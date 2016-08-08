@extends('project.template')

@section('title')
	M4dNation
@stop

@section('content')
	<div class="body-container">	
		@include('header')
		@include('project.yggdrasil')
		@include('project.why')
		@include('project.how')
		@include('project.what')
		@include('footer')
	</div>
@stop
