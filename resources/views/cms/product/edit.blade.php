@extends('cms.'.$master)
@section('content')
    <div>
        <h1>Edit {{$data->product_name}} Details</h1>
        <a href="{{route($base_route.'.index')}}"><button class="btn btn-default">Back To Index</button></a>
    </div>
    {{Form::model($data,['route'=>[$base_route.'.update',$data->id],'method'=>"PUT",'enctype'=>'multipart/form-data','files'=>true])}}
    @include('cms.product.partials._form',['submitButton'=>"Save"])
    {{Form::close()}}
@endsection