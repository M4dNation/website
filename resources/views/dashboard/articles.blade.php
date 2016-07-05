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
						<a href="{{ route('dashboard.article') }}">New</a>
					</div>
				</div>
				@foreach ($articles as $article)
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 user-box">
						<p>
							{{ $article->title . " - " . date('F d, Y', strtotime($article->updated_at)) }}
							<a class="pull-right action-link" href="{{ route('dashboard.edit.article', $article->id) }}"><i class="fa fa-pencil-square-o"></i></a>
						<p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
@stop