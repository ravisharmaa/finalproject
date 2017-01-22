@extends('cms.'.$master)
@section('content')
    <div>
        <h1>{{"Create Sub-Category for"  .$data['parent']->name}}</h1>
    </div>
    <a href="{{route($base_route.'.add-child.subcat',$data['parent']->id)}}"><button class="btn btn-default">Create A Sub Category for {{$data['parent']->name}}</button></a>
    <a href="{{route($base_route.'.edit',$data['parent']->id)}}"><button class="btn btn-danger">Edit Category</button></a>
    <hr/>
    @if(Session::has('message'))
        {!!  Session::get('message')  !!}
    @endif
    @foreach($data['child'] as $cd)
        <div class="col-md-3">
            <div class="well">
                <h4 class="text-success"><span class="label label-success pull-right">{{$cd->child_type}}</span> {{ucfirst($cd->name)}} </h4>
                <a href="{{route($base_route.'.sub-cat.index', $cd->slug)}}"><h5><span class="label label-primary pull-left">Edit</span></h5></a>
                <span class="label label-danger pull-right">Delete</span>
            </div>
        </div>
    @endforeach

@endsection
