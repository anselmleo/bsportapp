@extends('layouts.app')

@section('content')
    
    <h1>{{$post->title}}</h1>
    
    <div class="jumbotron p-3">{!!$post->body!!}</div>
    <hr>
    
    
    <form action="/posts/{{$post->id}}" method="POST"> 
        <input type="hidden" name="_method" value="DELETE">
        @csrf
        <small class="mr-2">Written on {{$post->created_at}}</small>
        <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit Post</a>
        <input type="submit" name="Delete" value="Delete Post" class="btn btn-danger">
        <a href="/posts" class="btn btn-default">Back</a>
    </form>
    

@endsection

