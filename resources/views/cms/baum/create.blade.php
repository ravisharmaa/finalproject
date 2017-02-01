@extends('cms.'.$master)
    @section('content')
        {{Form::open(['route'=>$base_route.'.store',"method"=>'POST'])}}
        @include('cms.partials.formerrors')
        @include($view_path.'.partials._form',['submitButton'=>"Save"])
        {{Form::close()}}
    @endsection

    @section('extra-scripts')
        <script type="text/javascript">
            $(document).ready(function () {
                $("#child-check").click(function () {
                   var val = $(this);
                   console.log(val);
                });
            });
        </script>
    @endsection