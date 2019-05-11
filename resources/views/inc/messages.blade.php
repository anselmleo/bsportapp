{{-- @if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="container alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif --}}

@if(session('error'))
    <div class="container alert alert-danger">
        {{session('error')}}
    </div>
@endif

@if(session('success'))
    <div class="container alert alert-success">
        {{session('success')}}
    </div>
@endif
