@extends('dashboard.template')

@section('title')
	User Management
@stop

@section('content')
	@include('dashboard.header')
	<div class="container user-management-container">
		<div class="row user-management-content">
			<div class="col-lg-12 col-md-12 col-sm-12 user-list">
				<div class="row">
					<div class="col-lg-12 text-center title-box">
						<h1>Users</h1>
						<a class="btn btn-lg btn-primary" href="{{ route('dashboard.user') }}">New</a>
					</div>
				</div>
				@foreach ($users as $u)
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 user-box">
						<p>
							{{ $u->username }}
							<a class="pull-right action-link" href="{{ route('dashboard.edit.user', $u->id) }}"><i class="fa fa-pencil-square-o"></i></a>
						<p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@stop