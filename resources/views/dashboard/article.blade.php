@extends('dashboard.template')

@section('title')
Create Article
@stop

@section('content')
	@include('dashboard.header')
	<div class="container article-creation-container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 title-box text-center">
				<h1>New article</h1>
				<a href="{{ route('dashboard.articles') }}">Articles list</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 form-title-box">
				<h2>Basic Settings</h2>
				<h3>Create a new article</h3>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 form-content-box">
				{!! Form::open(['url' => 'dashboard/article', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal article-form center-block']) !!}

				<div class="form-group">
					<div class="col-lg-4 col-md-4">
						<label for="title" class="pull-right">Title</label>
					</div>
					<div class="col-lg-4">
						<input type="text" name="title" id="title" required="" class="form-control" />
						{!! $errors->first('title', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="col-lg-4 col-md-4">
					</div>
				</div>

			<div class="form-group">
					<div class="col-lg-4 col-md-4">
						<label for="content" class="pull-right">Content</label>
					</div>
					<div class="col-lg-4">
						<textarea name="content" id="content" required="" placeholder="Your content" class="form-control">
						</textarea>
						{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
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