@extends('cms.'.$master)
@section('content')
    <div>
        <h1>Product Index</h1>
    </div>
    <hr/>
    @foreach($data as $d)
        <div class="col-md-3">
            <div class="well">
                <h4 class="text-success">{{$d->product_name}}
                  @if($d->status==1)
                    <span class="label label-success pull-right">Available</span>  </h4>
                  @else
                    <span class="label label-danger pull-right">Out-of Stock</span>  </h4>
                      @endif
                <a href="{{route('cms.product.show',$d->id)}}"><h5><span class="label label-primary pull-left">Details</span></h5></a>
                <span class="label label-danger pull-right">Delete</span>

            </div>
        </div>

    @endforeach
@endsection