@extends('dashboard.template')

@section('title')
	User Management
@stop

@section('content')
	@include('dashboard.header')
	<div class="container user-management-container">
		<div class="row user-management-content">
			<div class="col-lg-3 col-md-3 col-sm-3 user-list">
				<div class="row">
					<div class="col-lg-12 text-center title-box">
						<h1>Users</h1>
					</div>
				</div>
				@foreach ($users as $u)
				<div class="row">
					<div class="col-lg-12 user-box">
						<p>
							{{ $u->username }} 
							<a href="#"><i class="fa fa-times-circle pull-right"></i></a>
							<a href="#"><i class="fa fa-pencil-square-o pull-right"></i></a>
						<p>
					</div>
				</div>
				@endforeach
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1">
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 user-data">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 title-box text-center">
						<h1>Account</h1>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 form-title-box">
						<h2>Basic Settings</h2>
						<h3>Change basic account settings.</h3>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 form-content-box">
						{!! Form::open(['url' => 'login', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal user-form center-block']) !!}
						
						<div class="form-group">
							<div class="col-lg-4 col-md-4">
								<label for="username" class="pull-right">Username</label>
							</div>
							<div class="col-lg-4">
	      						<input type="text" name="username" id="username" required="" class="form-control" />
	    					</div>
	    					<div class="col-lg-4 col-md-4">
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-4 col-md-4 center-bloc">
								<label for="email" class="pull-right">Email</label>
							</div>
							<div class="col-lg-4">
	      						<input type="email" name="email" id="email" required="" class="form-control" />
	    					</div>
	    					<div class="col-lg-4 col-md-4">
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-4 col-md-4">
							</div>
							<div class="col-lg-4">
		      					<input type="password" name="password" id="password" required="" class="form-control" />
		    				</div>
		    				<div class="col-lg-4 col-md-4">
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-4 col-md-4">
							</div>
		    				<div class="col-lg-4">
		      					<input type="submit" class="btn btn-default btn-lg center-block" value="Save" />
		    				</div>
		    				<div class="col-lg-4 col-md-4">
							</div>
		  				</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@stop