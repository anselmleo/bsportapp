@extends('layouts.app')

@section('content')
    
    <h1>{{$post->title}}</h1>
    
    <div class="jumbotron p-3">{!!$post->body!!}</div>
    <hr>

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <form action="/posts/{{$post->id}}" method="POST"> 
                <input type="hidden" name="_method" value="DELETE">
                @csrf
                <small class="mr-2">Written on {{$post->created_at}} by {{$post->user->name}}</small>
                <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit Post</a>
                <input type="submit" name="Delete" value="Delete Post" class="btn btn-danger">
                <a href="/posts" class="btn btn-default">Back</a>
            </form>
        @else 
            <p><a href="/posts" class="btn btn-default mr-1">Back</a> |<em class="ml-3">You can't edit other people's posts</em></p>
        @endif
    @else
        <p><a href="/login">Login</a> to enable create, edit and delete posts </p>
    @endif
@endsection

