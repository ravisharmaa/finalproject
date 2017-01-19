@extends('cms.'.$master)
@section('content')
    @if(Session::has('message'))
        {{ Session::get('message') }}
    @endif
    <div>
        <h1>{{'Index Of.'.ucfirst($extra_values['title'])}}</h1>
    </div>
    <a href="{{route($base_route.'.create')}}"><button class="btn btn-default">Create A Category</button></a>


@endsection
