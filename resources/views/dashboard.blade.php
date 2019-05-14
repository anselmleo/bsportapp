@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="btn btn-primary mb-5" href="/posts/create">Create Post</a>
                    <h3>Your Blog Posts</h3>
                    @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                                
                            @foreach ($posts as $post)
                            <tr>
                                <th>{{$post->title}}</th>
                                <th><a href="/posts/{{$post->id}}" class="btn btn-default">View</a></th>
                                <th><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a></th>
                                <th>
                                    <form action="/posts/{{$post->id}}" method="POST"> 
                                        <input type="hidden" name="_method" value="DELETE">
                                        @csrf
                                        <input type="submit" name="Delete" value="Delete Post" class="btn btn-danger">
                                    </form>
                                </th>
                            </tr>
                            @endforeach
                        </table>
                    @else 
                        <p class="card p-5 alert-primary">You have not created any posts.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
