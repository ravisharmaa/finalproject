@extends('cms.'.$master)
@section('content')
    <div>
        <h1>Product Details {{$data->product_name}}</h1>
        <a href="{{route($base_route.'.edit',$data->id)}}"><button class="btn btn-danger">Edit {{$data->product_name}} Details</button></a>
    </div>
    <hr/>

        <div class="col-md-6">
            <div class="jumbotron">
                <h3>{{$data->product_name}}</h3>
                <p>{{$data->product_description}}</p>
                <p> Price:Rs {{$data->wholesell_price}}(wholesale price)</p>
                <p> Rs{{$data->retail_price}}(retail price)</p>
            </div>
        </div>
    <div class="col-md-4">
        <div class="jumbotron">
            <h3>Category: {{$data->category->name}}</h3>
            <p></p>
            <p>This is some text.</p>
            <p>This is another text.</p>
        </div>
    </div>

@endsection