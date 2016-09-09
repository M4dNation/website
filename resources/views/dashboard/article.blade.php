@extends('dashboard.template')

@section('title')
{{ trans('dashboard.blog.newArticleTitle') }}
@stop

@section('content')
@include('dashboard.header')
<div class="container article-creation-container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 title-box text-center">
			<h1>{{ trans('dashboard.blog.newArticle') }}</h1>
			<a class="btn btn-lg btn-primary" href="{{ route('dashboard.articles') }}">{{ trans('dashboard.blog.articlesList') }}</a>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 form-title-box">
			<h2>{{ trans('dashboard.blog.basicSettings') }}</h2>
			<h3>{{ trans('dashboard.blog.newArticleTitle') }}</h3>
		</div>
		
		<div class="col-lg-12 col-md-12 col-sm-12 form-content-box">
			{!! Form::open(['id' => 'articleCreationForm', 'url' => 'dashboard/article', 'method' => 'post', 'role' => 'form', 'class' => 'form-horizontal article-form center-block']) !!}

			<div class="form">
				<select class="lang-selector" onchange="Application.LangManager.switchLang('form');"  name="lang" id="lang">
					@foreach(Config::get('app.locales') as $lang => $languages)
						@if($lang == "en")
							<option value="{{$lang}}" selected>{!! trans('langs.dashboard.'.$lang) !!}</option>
						@else
							<option value="{{$lang}}">{!! trans('langs.dashboard.'.$lang) !!}</option>
						@endif
						
					@endforeach
				</select>
				<div class="form-group">				
					<input name="number_label" type="hidden" value="0"/>
					<input name="lang_list" class="lang_list" type="hidden" value="en"/>
					<input name="current_redactor" class="current_redactor" type="hidden" value="en"/>
					<input name="current_fileManager" class="current_fileManager" type="hidden" value="en"/>
				</div>

				<div class="en">	
					<div class="form-group">
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<label for="title" class="pull-right">{{ trans('dashboard.blog.title') }}</label>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<input type="text" name="title-en" id="title" required="" class="form-control" placeholder="{{ trans('dashboard.blog.placeholderTitle') }}" />
							{!! $errors->first('title-en', '<small class="help-block">:message</small>') !!}
						</div>
					</div>

					<div class="form-group">
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
							<label for="content" class="pull-right">{{ trans('dashboard.blog.content') }}</label>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<div id="en" class="redactor">{{ trans('dashboard.blog.placeholderContent') }}</div>
						</div>
						{!! $errors->first('content-en', '<small class="help-block">:message</small>') !!}
					</div>


					<div class="form-group mrg-t-20">
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<div class="row">
								<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 thumbnails">

								</div> 
								<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
									<a onclick="Application.FileManager.launch('articleCreationForm');" class="btn btn-default btn-lg center-block btn-submit mrg-b-10">{{ trans('dashboard.blog.addImage') }}</a>
								</div>
							</div>
						</div>
					</div>

					<div class="form-group mrg-t-50">
						<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
						</div>
						<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
							<input type="submit" class="btn btn-default btn-lg center-block btn-submit pull-left" value="{{ trans('dashboard.blog.create') }}" />
						</div>
					</div>
				</div>	
			</div>			
			{!! Form::close() !!}		
		</div>
	</div>
</div>
@stop