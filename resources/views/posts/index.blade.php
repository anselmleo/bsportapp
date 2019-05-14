@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    
    @if(count($posts)>0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <li class="list-group-item mb-2">
                            <a href="/posts/{{$post->id}}"><h3>{{$post->title}}</h3></a>
                            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small> 
                        </li>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <img style="width:50%; height:100px;" src="/storage/cover_images/{{$post->cover_image}}" alt="Cover Image">
                    </div>
                </div>
            </div>
        @endforeach
    {{$posts->links()}}
    @else 
        <p>No posts found!</p>
    @endif
@endsection

