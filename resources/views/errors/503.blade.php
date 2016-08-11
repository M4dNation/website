@extends('errors.template')

@section('title')
   503 - Under Maintenance
@stop

@section('content')
    <div class="errors-container">    
        <img src="{{ asset('images/errors/503.png') }}" alt="">       
    </div>

@stop