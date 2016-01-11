@extends('forum/template')

@section('title')
Forum
@stop

@section('content')
<div clas="container">
    <?php dd($categories[2]->firstThread); ?>
</div>
@stop
