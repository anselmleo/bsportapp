@extends('layouts.app')

@section('content')
    
    <h1>{{$post->title}}</h1>
    
    <div class="jumbotron p-3">{!!$post->body!!}</div>
    <hr>
    <small class="mr-2">Written on {{$post->created_at}}</small>
    
    <a href="/posts" class="btn btn-default">Back</a>

@endsection

