
@extends('cms.'.$master)
@section('content')
    <div>
        <h1>{{"Create"   .ucfirst($extra_values['title'])}}</h1>
        <a href="{{route($base_route.'.index')}}"><button class="btn btn-default">Back To Index</button></a>
    </div>
    <br>
    {{Form::model($data['main'],['route'=>[$base_route.'.update',$data['main']->id],'method'=>'PUT','enctype'=>'multipart/form-data','files'=>true])}}
        @if($data['main']->parent_id!='')
            {{Form::select('parent_id', $data['sub'], null ,['class'=>'form-control'])}}
        @endif
        @include($view_path.'.partials._form',['submitButton'=>"Save"])
    {{Form::close()}}
@endsection
{{--@section('extra-scripts')--}}
    {{--<script type="text/javascript">--}}
        {{--$(document).ready(function(){--}}
            {{--$("#myForm").ajaxForm(function(){--}}

            {{--});--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}
