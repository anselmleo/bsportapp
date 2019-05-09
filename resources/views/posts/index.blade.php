@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    
    @if(count($posts)>0)
    
    @foreach($posts as $post)
        <li class="list-group-item mb-2">
            <h3>{{$post->title}}</h3>
            <small>Written on {{$post->created_at}}</small>
        </li>
    @endforeach

    @else 
        <p>No posts found!</p>
    @endif
@endsection

