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
					<div class="redactorMenu">
						<a onclick="Application.Redactor.write('bold');" href="#articleCreationForm"><i class="fa fa-bold" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('italic');" href="#articleCreationForm"><i class="fa fa-italic" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('underline');" href="#articleCreationForm"><i class="fa fa-underline" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('strikeThrough');" href="#articleCreationForm"><i class="fa fa-strikethrough" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('insertunorderedlist');" href="#articleCreationForm"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('insertorderedlist');" href="#articleCreationForm"><i class="fa fa-list-ol" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('createLink');" href="#articleCreationForm"><i class="fa fa-link" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('iframe', '');" href="#articleCreationForm"><i class="fa fa-video-camera" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('formatBlock', '<h2>');" href="#articleCreationForm">h1</a>
						<a onclick="Application.Redactor.write('formatBlock', '<h3>');" href="#articleCreationForm">h2</a>
						<a onclick="Application.Redactor.write('formatBlock', '<h4>');" href="#articleCreationForm">h3</a>
						<a onclick="Application.Redactor.write('formatBlock', '<h5>');" href="#articleCreationForm">h4</a>
						<a onclick="Application.Redactor.write('justifyCenter');" href="#articleCreationForm"><i class="fa fa-align-center" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('justifyLeft');" href="#articleCreationForm"><i class="fa fa-align-left" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('justifyRight');" href="#articleCreationForm"><i class="fa fa-align-right" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('justifyFull');" href="#articleCreationForm"><i class="fa fa-align-justify" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('superscript');" href="#articleCreationForm"><i class="fa fa-superscript" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('subscript');" href="#articleCreationForm"><i class="fa fa-subscript" aria-hidden="true"></i></a>
						<input type="color" value="#000000" onChange="Application.Redactor.write('forecolor',this.value);"/>
						<input type="color" value="#ffffff" onChange="Application.Redactor.write('backColor',this.value);"/>
						<a onclick="Application.Redactor.write('undo');" href=""><i class="fa fa-undo" aria-hidden="true"></i></a>
						<a onclick="Application.Redactor.write('redo');" href=""><i class="fa fa-repeat" aria-hidden="true"></i></a>
						<select onchange="Application.Redactor.toggleView()" id="redactorView">
							<option value="preview" selected>Preview</option> 
							<option value="source">Source</option>
						</select>
					</div>
					<div contenteditable="true" onKeyUp="Application.Redactor.read();" onChange="Application.Redactor.read();"   required="" class="form-control redactorContainer">Your content.</div>
					<textarea class="hidden" name="content" id="redactorInput" cols="30" rows="10"></textarea>


				</div>
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