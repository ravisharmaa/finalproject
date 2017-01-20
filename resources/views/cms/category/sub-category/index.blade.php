@extends('cms.'.$master)
@section('content')
    <div>
        <h1></h1>
    </div>
    <a href="{{route($base_route.'.create.sub-cat', $data->id)}}    "><button class="btn btn-default">Create A Sub-Category for {{$data->name}}</button></a>
    <a href="#"><button class="btn btn-danger">Edit This Category</button></a>
    <hr/>
    @if(Session::has('message'))
        {!!  Session::get('message')  !!}
    @endif

        <div class="col-md-3">
            <div class="well">
                <h4 class="text-success"><span class="label label-success pull-right"></span>  </h4>
                <a href="#"><h5><span class="label label-primary pull-left">Edit</span></h5></a>
                <span class="label label-danger pull-right">Delete</span>
            </div>
        </div>


@endsection
