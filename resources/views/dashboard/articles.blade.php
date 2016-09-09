@extends('dashboard.template')

@section('title')
	{{ trans('dashboard.blog.articlesTitle') }} 
@stop

@section('content')
	@include('dashboard.header')
	<div class="container article-management-container">
		<div class="row article-management-content">
			<div class="col-lg-12 col-md-12 col-sm-12 user-list">
				<div class="row">
					<div class="col-lg-12 text-center title-box">
						<h1>{{ trans('dashboard.blog.articlesTitle') }}</h1>
						<a class="btn btn-lg btn-primary" href="{{ route('dashboard.article') }}">{{ trans('dashboard.blog.newArticle') }}</a>
					</div>
				</div>
				@foreach ($articles as $article)
					@if ($article->lang == "en")
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 user-box">
							<p>
								{{ $article->title . " - " . date('F d, Y', strtotime($article->updated_at)) }}
								<a class="pull-right action-link" href="{{ route('dashboard.edit.article', $article->number_label) }}"><i class="fa fa-pencil-square-o"></i></a>
								<a target="_blank" class="pull-right action-link" href="{{ route('dashboard.preview.article', $article->number_label) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
								@if($article->state == 1)
									<a href= "{{ route('dashboard.draft.article', $article->number_label) }}" class="state label pull-right label-success">{{ trans('dashboard.blog.published') }}</a>
								@endif
								@if($article->state == 0)
									<a href= "{{ route('dashboard.publish.article', $article->number_label) }}" class="state label pull-right label-danger">{{ trans('dashboard.blog.draft') }}</a>
								@endif
							<p>
						</div>
					</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
@stop