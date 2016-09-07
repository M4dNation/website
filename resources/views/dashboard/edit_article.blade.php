@extends('dashboard.template')

@section('title')
{{ $articles[0]->title }}
@stop

@section('content')
@include('dashboard.header')
<?php
	$langList = $articles[0]->lang;
?>
<div class="container article-creation-container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 title-box text-center">
			<h1>Edit article</h1>
			<a class="btn btn-lg btn-primary" href="{{ route('dashboard.articles') }}">Articles list</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 form-title-box">
			<h2>Basic Settings</h2>
			<h3>Edit an article.</h3>
		</div>
	
		<div class="col-lg-12 col-md-12 col-sm-12 form-content-box">
			{!! Form::open(['id' => 'articleEditForm', 'url' => 'dashboard/article/' . $articles[0]->id, 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal user-form center-block']) !!}
			
			<select class="lang-selector" onchange="Application.LangManager.switchLang();"  name="lang" id="lang">
					@foreach($articles as $article)
						@if($article->lang == $articles[0]->lang)
							<option value="{{ $article->lang }}" selected>{{ $article->lang }}</option>
						@else
							<option value="{{ $article->lang }}">{{ $article->lang }}</option>
							<?php
								$langList .= ",".$article->lang;
							?>
						@endif
					@endforeach
			</select>
			<div class="form-group">				
					<input name="number_label" type="hidden" value="{{ $articles[0]->number_label }}"/>
					<input name="lang_list" class="lang_list" type="hidden" value="{{ $langList }}"/>		
					<input name="current_redactor" class="current_redactor" type="hidden" value="{{ $articles[0]->lang }}"/>
					<input name="current_fileManager" class="current_fileManager" type="hidden" value="{{ $articles[0]->lang }}"/>
			</div>
			

			@foreach($articles as $article)
			<div class="{{ $article->lang }}">
				<div class="form-group">				
						<input name="id-{{$article->lang}}" type="hidden" value="{{ $article->id }}"/>
				</div>
				<div class="form-group">
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
						<label for="title" class="pull-right">Title</label>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<input type="text" name="title-{{ $article->lang }}" placeholder="{{ $article->title }}" value="{{ $article->title }}" required="" class="form-control" />
						{!! $errors->first('title-en', '<small class="help-block">:message</small>') !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
						<label for="content" class="pull-right">Content</label>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div id="{{$article->lang}}" class="redactor">
							{!! $article->content !!}
						</div>
						{!! $errors->first('content-en', '<small class="help-block">:message</small>') !!}
					</div>
				</div>

				<div class="form-group mrg-t-20">
					<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 thumbnails">
								<?php $compteur = 0; ?>
								@foreach($article->images as $image)
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<img src="{{ asset($image->path . $image->name) }}" alt="">
									<input class="selectedImage {{$article->lang}}" name="image{{ $compteur }}" type="hidden" value="{{ $image->name }}">
								</div>
								<?php $compteur++; ?>
								@endforeach
							</div> 
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<a onclick="Application.FileManager.launch('articleEditForm');" class="btn btn-default btn-lg center-block btn-submit mrg-b-10">Add Image </a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			@endforeach
			<div class="form-group mrg-t-50">
				<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<input type="submit" class="btn btn-default btn-lg center-block btn-submit" value="Save" />
				</div>
			</div>
			
			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop
