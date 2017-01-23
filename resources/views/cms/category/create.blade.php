@extends('cms.'.$master)
@section('content')
    <div>
        <h1>{{"Create"   .ucfirst($extra_values['title'])}}</h1>
        <a href="{{route($base_route.'.index')}}"><button class="btn btn-default">Back To Index</button></a>
    </div>
    {{Form::open(['route'=>$base_route.'.store',"method"=>'POST', "enctype"=>'multipart/form-data','files'=>'true','id'=>'myForm'])}}
    @include('cms.partials.formerrors')
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
