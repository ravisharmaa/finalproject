<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>
    <link href="{{asset($css_path.'bootstrap.css')}}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>
    @yield('search-box')
    <div class="container">
        @yield('content')
            <div class="row">

            </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{asset($js_path.'bootstrap.js')}}"></script>
<script src="{{asset($js_path.'jquery.form.min.js')}}"></script>

@yield('extra-scripts')
    <script src="{{asset($js_path.'jquery-ui.min.js')}}"></script>
</body>
</html>