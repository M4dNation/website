@extends('auth.template')

@section('title')
	M4dNation - Login
@stop

@section('content')
	<section id="login" class="section">
		<div class="container">
			<div class="row mrg-t-20">
				<div class="col-lg-4 col-md-4">
				</div>
				<div class="col-lg-4 col-md-4">
					<a href="{{ route('home') }}"><img class="img-responsive center-block" src="../resources/assets/image/common/logoM4dNation.png" alt=""></a>
				</div>
				<div class="col-lg-4 col-md-4">
				</div>
			</div>
			<div class="row mrg-t-20">
				<div class="col-lg-12 col-md-12">
					@if(session()->has('error'))
						@include('errors/error', ['type' => 'danger', 'message' => session('error')])
					@endif		
				
					{!! Form::open(['url' => 'login', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal center-block']) !!}	
					
					<div class="form-group">
						<div class="col-lg-4 col-md-4">
						</div>
						<div class="col-lg-4">
	      					<input type="email" name="email" id="email" required="" class="form-control login-input" placeholder="EMAIL" />
	    				</div>
	    				<div class="col-lg-4 col-md-4">
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-md-4">
						</div>
						<div class="col-lg-4">
	      					<input type="password" name="password" id="password" required="" class="form-control login-input" placeholder="PASSWORD" />
	    				</div>
	    				<div class="col-lg-4 col-md-4">
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-4 col-md-4">
						</div>
						<div class="col-lg-4">
							<div class="checkbox">
								<label class="center_block">
									<input type="checkbox" name="remember" id="remember" /> <span class="remember-me">REMEMBER ME</span>
								</label>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-lg-4 col-md-4">
						</div>
	    				<div class="col-lg-4">
	      					<input type="submit" class="btn btn-default btn-lg login-input center-block" value="Login" />
	    				</div>
	    				<div class="col-lg-4 col-md-4">
						</div>
	  				</div>
					
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</section>
@stop