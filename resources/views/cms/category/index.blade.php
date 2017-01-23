@extends('cms.'.$master)
@section('search-box')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Search Products</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-3">

                    <div class="form-group has-feedback">
                      {{Form::label('search',"Search",['class'=>'sr-only'])}}
                        {{Form::text('search',null,['class'=>'form-control','id'=>'search','placeholder'=>'Search The Product You Wish'])}}
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div>
        <h1>{{"List Of Parent "  .  ucfirst($extra_values['title'])}}</h1>
    </div>
    <a href="{{route($base_route.'.create')}}"><button class="btn btn-default">Create A Category</button></a>
    <a href="{{route('cms.product.index')}}"><button class="btn btn-primary">Product Index</button></a>
    <hr/>
    @if(Session::has('message'))
        {!!  Session::get('message')  !!}
    @endif
    @foreach($cat_data as $cd)
        <div class="col-md-3">
            <div class="well">
                <h4 class="text-success"><span class="label label-success pull-right">{{$cd->child_type}}</span> {{ucfirst($cd->name)}} </h4>
                <a href="{{route($base_route.'.sub-cat.index', $cd->slug)}}"><h5><span class="label label-primary pull-left">Edit</span></h5></a>
                <a href="{{route($base_route.'.delete',$cd->id)}}"><span class="label label-danger pull-right">Delete</span></a>
                <span class="label label-info pull-right">Details</span>
            </div>
        </div>
    @endforeach

@endsection
@section('extra-scripts')
    <script type="text/javascript">
        $("document").ready(function () {
            $("#search").keyup(function () {
                var search = $(this).val();
                var params= {'search':search};
                $.ajax({
                    method:'GET',
                    url: '{{route($base_route.'.search')}}',
                    data: params,
                    success:function(response){
                       var data = jQuery.parseJSON(response);
                       console.log(data);
                        for(var i= 0; i<data.length; i++){
                            console.log(data[i].category_id);
                      }
                    }

                });
            });
        })
    </script>
@endsection

