@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Edit Post</h1>
    
<form action="/posts/{{$post->id}}" method="POST">
        <input type="hidden" name="_method" value="put">
        @csrf
        
        {{-- @if(count($errors->get('title'))>0)
            <div class="container alert alert-danger">{{$errors->get('title')[0]}}</div>
        @endif --}}
        <div class="form-group">
            @error('title')
                <div class="alert alert-danger"> {{$message}}</div>
            @enderror
            <label for="title">Title</label>
            <input name="title" type="text" value="{{$post->title}}" placeholder="Enter Title" class="form-control">
        </div>

        {{-- @if(count($errors->get('body'))>0)
            <div class="container alert alert-danger">{{$errors->get('body')[0]}}</div>
        @endif --}}
        <div class="form-group">
            @error('body')
                <div class="alert alert-danger"> {{$message}}</div>
            @enderror
            <label for="body">Body</label>
            <textarea id="ckeditor" name="body"  placeholder="Enter body text" class="form-control" rows="5">{{$post->body}}</textarea>
        </div>

        <input type="submit" value="Submit" class="btn btn-primary">
    </form>

@endsection