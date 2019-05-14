@extends('layouts.app')

@section('content')
    <h1 class="mb-3">Create Post</h1>
    
    <form action="/posts" method="POST">
        @csrf
        
        {{-- @if(count($errors->get('title'))>0)
            <div class="container alert alert-danger">{{$errors->get('title')[0]}}</div>
        @endif --}}
        <div class="form-group">
            @error('title')
                <div class="alert alert-danger"> {{$message}}</div>
            @enderror
            <label for="title">Title</label>
            <input name="title" type="text" placeholder="Enter Title" class="form-control">
        </div>

        {{-- @if(count($errors->get('body'))>0)
            <div class="container alert alert-danger">{{$errors->get('body')[0]}}</div>
        @endif --}}
        <div class="form-group">
            @error('body')
                <div class="alert alert-danger"> {{$message}}</div>
            @enderror
            <label for="body">Body</label>
            <textarea id="ckeditor" name="body"  placeholder="Enter body text" class="form-control" rows="5"></textarea>
        </div>

        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
    {{-- {{Form::Open(['action'=>'PostController@store', 'method'=>'POST'])}}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '')}}
        </div>
    {{Form::Close()}} --}}

@endsection