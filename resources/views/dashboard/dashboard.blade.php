@extends('dashboard.template')

@section('title')
	Dashboard
@stop

@section('content')
		@include('dashboard.header')
		<div class="container dashboard-container">
			<div class="row">
				<div class="dashboard-item text-center">
					<a href="{{ route('dashboard.articles') }}">
						<img src="{{ asset('images/dashboard/pencil.png') }}" alt="">
						<h2>{{ trans('dashboard.blogLink') }}</h2>
					</a>
				</div>
				<div class="dashboard-item text-center">
						<a href="{{ route('dashboard.users') }}">
							<img src="{{ asset('images/dashboard/user.png') }}" alt="">
						<h2>{{ trans('dashboard.usersLink') }}</h2>
					</a>
				</div>			
			</div>
		</div>
@stop
