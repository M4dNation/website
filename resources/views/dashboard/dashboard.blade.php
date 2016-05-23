@extends('dashboard.template')

@section('title')
	M4dNation - Dashboard
@stop

@section('content')
		@include('dashboard.header')
		<div class="container dashboard-container">
			<div class="row">
				<div class="dashboard-item text-center">
					<a href="{{ route('dashboard.blog') }}">
						<img src="{{ asset('images/dashboard/pencil.png') }}" alt="">
						<h2>Blog</h2>
					</a>
				</div>
				<div class="dashboard-item text-center">
					<a href="">
						<img src="{{ asset('images/dashboard/file.png') }}" alt="">
						<h2>Docs</h2>
					</a>
				</div>
			</div>
				<div class="row">
					<div class="dashboard-item text-center">
						<a href="{{ route('dashboard.users') }}">
							<img src="{{ asset('images/dashboard/user.png') }}" alt="">
						<h2>Users</h2>
					</a>
				</div>
				<div class="dashboard-item text-center">
					<a href="">
						<img src="{{ asset('images/dashboard/tool.png') }}" alt="">
						<h2>Admin</h2>
					</a>
				</div>
			</div>
		</div>
@stop
