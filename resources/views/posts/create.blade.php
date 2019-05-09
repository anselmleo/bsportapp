@extends('layouts.app')

@section('content')
    <h1>Create Posts</h1>
    
    {{Form::Open(['action'=>'PostController@store', 'method'=>'POST'])}}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '')}}
        </div>
    {{Form::Close()}}

@endsection