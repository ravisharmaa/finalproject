<div class="form-group">
    {{Form::label('product_name',"Product Name")}}
    {{Form::text('product_name', null,['class'=>'form-control','placeholder'=>'Enter Name'])}}
    {!! Lang::get('help.HELP_TEXT', ['field'=>'Product'])!!}
</div>
<div class="form-group">
    {{Form::label('product_description', "Description")}}
    {{Form::textarea('product_description', null,['class'=>'form-control','rows'=>'10', 'placeholder'=>'Enter Description'])}}
    {!! Lang::get('help.HELP_TEXT', ['field'=>'Product Description'])!!}
</div>
<div class="form-group">
    {{Form::label('wholesell_price', "Whole Sell Price")}}
    {{Form::number('wholesell_price', null,['class'=>'form-control','placeholder'=>'Wholesell Price', 'min'=>1])}}
    {!! Lang::get('help.HELP_TEXT', ['field'=>'Whole Sell Price'])!!}
</div>
<div class="form-group">
    {{Form::label('retail_price', "Retail Sell Price")}}
    {{Form::number('retail_price', null,['class'=>'form-control','placeholder'=>'Retail Price', 'min'=>1])}}
    {!! Lang::get('help.HELP_TEXT', ['field'=>'Retail Sell Price'])!!}
</div>
<div class="form-group">
    {{Form::label('radio', "Status")}}
    {{Form::radio('status',1,true)}}Available
    {{Form::radio('status',0)}}Un-Available
</div>
@if(isset($data->images))
   <p>Previous Images</p>
    @foreach($data->images as $img)
      <p><img src="{{asset($upload_folder.$img->image)}}" height="50" width="50"></p>
    @endforeach
@else
    <p>No Image Available</p>
@endif
<div class="form-group">
    {{  Form::label('image',"Image")}}
    <input type="file" name="image[]"multiple>
    {!! Lang::get('help.HELP_TEXT', ['field'=>'Image'])!!}

</div>
{{Form::button($submitButton,   ['type'=>'submit','class'=>'btn btn-primary'])}}
{{Form::button("Clear",         ['type'=>'submit','class'=>'btn btn-danger'])}}