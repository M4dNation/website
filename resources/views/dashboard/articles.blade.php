@extends('dashboard.template')

@section('title')
	Article Management
@stop

@section('content')
	@include('dashboard.header')
	<div class="container article-management-container">
		<div class="row article-management-content">
			<div class="col-lg-12 col-md-12 col-sm-12 user-list">
				<div class="row">
					<div class="col-lg-12 text-center title-box">
						<h1>Articles</h1>
						<a class="btn btn-lg btn-primary" href="{{ route('dashboard.article') }}">New</a>
					</div>
				</div>
				@foreach ($articles as $article)
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 user-box">
						<p>
							{{ $article->title . " - " . date('F d, Y', strtotime($article->updated_at)) }}

							
							<a class="pull-right action-link" href="{{ route('dashboard.edit.article', $article->id) }}"><i class="fa fa-pencil-square-o"></i></a>
							<a target="_blank" class="pull-right action-link" href="{{ route('dashboard.preview.article', $article->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
							@if($article->state == 1)
								<a href= "{{ route('dashboard.draft.article', $article->id) }}" class="state label pull-right label-success">Published</a>
							@endif
							@if($article->state == 0)
								<a href= "{{ route('dashboard.publish.article', $article->id) }}" class="state label pull-right label-danger">Draft</a>
							@endif
						<p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@stop