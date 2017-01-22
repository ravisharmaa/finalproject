@extends('cms.'.$master)
@section('content')
    <div>
        <h1>{{"Create a product for "   .ucfirst($data['parent']->name)}}</h1>
        <a href="{{route($base_route.'.index')}}"><button class="btn btn-default">Back To Index</button></a>
    </div>
    {{Form::open(['route'=>'cms.product.store',"method"=>'POST', "enctype"=>'multipart/form-data','files'=>'true','id'=>'myForm'])}}
    {{Form::hidden('category_id',$data['parent']->id)}}
    @include('cms.product.partials._form',['submitButton'=>"Save"])
    {{Form::close()}}
@endsection