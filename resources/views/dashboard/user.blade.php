@extends('dashboard.template')

@section('title')
Create User
@stop

@section('content')
	@include('dashboard.header')
	<div class="container user-creation-container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 title-box text-center">
				<h1>New account</h1>
				<a href="{{ route('dashboard.users') }}">Users list</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 form-title-box">
				<h2>Basic Settings</h2>
				<h3>Change basic account settings.</h3>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 form-content-box">
				{!! Form::open(['url' => 'dashboard/user', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal user-form center-block']) !!}

				<div class="form-group">
					<div class="col-lg-4 col-md-4">
						<label for="username" class="pull-right">Username</label>
					</div>
					<div class="col-lg-4">
						<input type="text" name="username" id="username" required="" class="form-control" />
						{!! $errors->first('username', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="col-lg-4 col-md-4">
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-4 col-md-4">
						<label for="email" class="pull-right">Email</label>
					</div>
					<div class="col-lg-4">
						<input type="email" name="email" id="email" required="" class="form-control" />
						{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="col-lg-4 col-md-4">
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-4 col-md-4">
						<label for="email" class="pull-right">Password</label>
					</div>
					<div class="col-lg-4">
						<input type="password" name="password" id="password" required="" class="form-control" />
						{!! $errors->first('password', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="col-lg-4 col-md-4">
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-4 col-md-4">
					</div>
					<div class="col-lg-4">
						<input type="submit" class="btn btn-default btn-lg center-block btn-submit" value="Create" />
					</div>
					<div class="col-lg-4 col-md-4">
					</div>
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop