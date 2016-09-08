@extends('dashboard.template')

@section('title')
{{ trans('dashboard.user.newAccount') }}
@stop

@section('content')
	@include('dashboard.header')
	<div class="container user-creation-container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 title-box text-center">
				<h1>{{ trans('dashboard.user.newAccount') }}</h1>
				<a class="btn btn-lg btn-primary" href="{{ route('dashboard.users') }}">{{ trans('dashboard.user.accountsList') }}</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 form-title-box">
				<h2>{{ trans('dashboard.user.basicSettings') }}</h2>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 form-content-box">
				{!! Form::open(['url' => 'dashboard/user', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal user-form center-block']) !!}

				<div class="form-group">
					<div class="col-lg-4 col-md-4">
						<label for="username" class="pull-right">{{ trans('dashboard.user.username') }}</label>
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
						<label for="email" class="pull-right">{{ trans('dashboard.user.email') }}</label>
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
						<label for="password" class="pull-right">{{ trans('dashboard.user.password') }}</label>
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
						<input type="submit" class="btn btn-default btn-lg center-block btn-submit" value="{{ trans('dashboard.user.create') }}" />
					</div>
					<div class="col-lg-4 col-md-4">
					</div>
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop