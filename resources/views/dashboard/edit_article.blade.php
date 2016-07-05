@extends('dashboard.template')

@section('title')
{{ $article->title }}
@stop

@section('content')
	@include('dashboard.header')
	<div class="container article-creation-container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 title-box text-center">
				<h1>Edit article</h1>
				<a href="{{ route('dashboard.articles') }}">Articles list</a>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 form-title-box">
				<h2>Basic Settings</h2>
				<h3>Edit an article.</h3>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 form-content-box">
				{!! Form::open(['url' => 'dashboard/article/' . $article->id, 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal user-form center-block']) !!}

				<div class="form-group">
					<div class="col-lg-4 col-md-4">
						<label for="title" class="pull-right">Title</label>
					</div>
					<div class="col-lg-4">
						<input type="text" name="title" id="title" placeholder="{{ $article->title }}" value="{{ $article->title }}" required="" class="form-control" />
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
						<textarea name="content" id="content" required="" placeholder="{{ $article->content }}" class="form-control">
						{!! $article->content !!}
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
						<input type="submit" class="btn btn-default btn-lg center-block btn-submit" value="Save" />
					</div>
					<div class="col-lg-4 col-md-4">
					</div>
				</div>

				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop