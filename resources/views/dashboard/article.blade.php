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
			{!! Form::open(['id' => 'articleCreationForm', 'url' => 'dashboard/article', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal article-form center-block']) !!}

			<div class="form-group">
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
					<label for="title" class="pull-right">Title</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<input type="text" name="title" id="title" required="" class="form-control" placeholder="Your title" />
					{!! $errors->first('title', '<small class="help-block">:message</small>') !!}
				</div>
			</div>

			<div class="form-group">
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
					<label for="content" class="pull-right">Content</label>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<textarea name="content" id="content" required="" class="form-control" rows="25">Your content.</textarea>
					{!! $errors->first('email', '<small class="help-block">:message</small>') !!}
				</div>
			</div>
			


			<div class="form-group mrg-t-20">
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 thumbnails">
							
						</div> 
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<a onclick="Application.FileManager.launch('articleCreationForm');" class="btn btn-default btn-lg center-block btn-submit mrg-b-10">Add Image </a>
						</div>
					</div>
				</div>
			</div>

			<div class="form-group mrg-t-50">
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<input type="submit" class="btn btn-default btn-lg center-block btn-submit pull-left" value="Create" />
				</div>
			</div>


			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop