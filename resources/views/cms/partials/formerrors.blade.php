@foreach($errors->all() as $e)
    <div class="alert alert-danger ">
        <li>{{$e}}</li>
    </div>
@endforeach