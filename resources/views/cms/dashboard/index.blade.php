@extends('cms.'.$master)
@section('content')
    <style>
       body{
           background: #aaaaaa;
       }

        #menu {
            width: 220px;
        }
    </style>
    <ul id="menu">
        <li class="ui-state-disabled"><div>Toys (n/a)</div></li>
        <li><div>Books</div></li>
        <li><div>Clothing</div></li>
        <li><div>Electronics</div>
            <ul>
                <li class="ui-state-disabled"><div>Home Entertainment</div></li>
                <li><div>Car Hifi</div></li>
                <li><div>Utilities</div></li>
            </ul>
        </li>
        <li><div>Movies</div></li>
        <li><div>Music</div>
            <ul>
                <li><div>Rock</div>
                    <ul>
                        <li><div>Alternative</div></li>
                        <li><div>Classic</div></li>
                    </ul>
                </li>
                <li><div>Jazz</div>
                    <ul>
                        <li><div>Freejazz</div></li>
                        <li><div>Big Band</div></li>
                        <li><div>Modern</div></li>
                    </ul>
                </li>
                <li><div>Pop</div></li>
            </ul>
        </li>
        <li class="ui-state-disabled"><div>Specials (n/a)</div></li>
    </ul>
@endsection
@section('extra-scripts')
    <script type="text/javascript">
        $( function() {
            $( "#menu" ).menu();
        } );
    </script>
@endsection