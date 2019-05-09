@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    <p>This is where you see all the different sports we cover.</p>

    @foreach($sports as $sport)
        <ul class='list-group'>
            <a href="/sports/{{$sport}}"><li class='list-group-item'>{{$sport}}</li></a>
        </ul>
    @endforeach
@endsection

