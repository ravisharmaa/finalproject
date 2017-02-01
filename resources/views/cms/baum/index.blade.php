@extends('cms.'.$master)
<a href="{{route($base_route.'.create')}}">Create</a>
@section('content')
    @foreach($data as $d)
        <ul class="list-group">
            <a href="{{route($base_route.'.test-create-child', $d->parent_slug)}}"><li class="list-group-item">{{$d->parent_name}}</li></a>
        </ul>
    @endforeach

@endsection