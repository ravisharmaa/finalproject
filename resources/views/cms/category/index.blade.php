@extends('cms.'.$master)
@section('content')
    <div>
        <h1>{{"Index Of".ucfirst($extra_values['title'])}}</h1>
    </div>
    <a href="{{route($base_route.'.create')}}"><button class="btn btn-default">Create A Category</button></a>
    <a href="{{route($base_route.'.edit')}}"><button class="btn btn-danger">Edit Category</button></a>
    <hr/>
    @if(Session::has('message'))
        {!!  Session::get('message')  !!}
    @endif
    @foreach($cat_data as $cd)
        <div class="col-md-3">
            <div class="well">
                <h4 class="text-success"><span class="label label-success pull-right">{{$cd->child_type}}</span> {{ucfirst($cd->name)}} </h4>
                <a href="{{route($base_route.'.add_subcat', strtolower($cd->name))}}"<h5><span class="label label-primary pull-left">Edit</span></h5></a>
                <span class="label label-danger pull-right">Delete</span>
            </div>
        </div>
    @endforeach

@endsection
