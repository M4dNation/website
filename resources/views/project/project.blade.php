@extends('project.template')

@section('title')
	M4dNation
@stop

@section('content')
	<div class="body-container">	
		@include('project.header')
		@include('project.yggdrasil')
		@include('project.why')
		@include('project.how')
		@include('project.what')
		@include('project.footer')
	</div>
@stop
