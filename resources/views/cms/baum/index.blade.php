@extends('cms.'.$master)
<a href="{{route($base_route.'.create')}}">Create</a>
@section('content')
    @foreach($data as $d)
        <ul class="list-group">
            <div>
                <li class="list-group-item ">{{$d->parent_name}}</li>
                <button class="btn btn-danger add_button">
                    <i class="icon-plus bigger-150"></i>
                </button>
            <div id="myBtn">

            </div>

            </div>

        </ul>
    @endforeach

@endsection
{{--{{route($base_route.'.test-create-child', $d->parent_slug)}}--}}
@section('extra-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
           $(".add_button").click(function () {
               add_button_attr  =   $('.add_button');
               add_field_attr   =   $('#myBtn');
               index            =   parseInt(1);
               limit_counter    =   1;
               loadRow(add_button_attr,index);
           });
        });
        function loadRow(add_button_attr,index) {
            $.ajax({
                method  : 'GET',
                url     : '{{url('cms/baum/child-form')}}' + '/' + index,
                error   :  function(request){
                    console.log(request.responseText)
                },
                success : function (data) {

                }
            });
        }
    </script>

@endsection