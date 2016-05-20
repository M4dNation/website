@extends('auth.template')

@section('title')
	Login
@stop

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<img class="img-responsive center-block pdg-b-10" src="../resources/assets/image/common/logoM4dNation.png" alt="">
		</div>
		<div class="col-lg-12">
			@if(session()->has('error'))
				@include('errors/error', ['type' => 'danger', 'message' => session('error')])
			@endif		
			<h2>Login</h2>
			
			{!! Form::open(['url' => 'login', 'method' => 'post', 'role' => 'form']) !!}	
				
				{!! Form::text('email') !!}
				{!! Form::password('password') !!}
				{!! Form::submit("Connexion") !!}
				
			{!! Form::close() !!}
		</div>
	</div>
@stop