@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts)>0)
        @foreach($posts as $post)
            <li class="list-group-item mb-2">
                <a href="/posts/{{$post->id}}"><h3>{{$post->title}}</h3></a>
                <small>Written on {{$post->created_at}} by {{$post->user->name}}</small> 
            </li>
        @endforeach
        {{$posts->links()}}
    @else 
        <p>No posts found!</p>
    @endif

@endsection

