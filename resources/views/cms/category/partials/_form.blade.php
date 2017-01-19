<div class="form-group">
    {{Form::label('name',"Name")}}
    {{Form::text('name', null,['class'=>'form-control','placeholder'=>'Enter Name'])}}
    <small id='emailHelp' class='form-text text-muted'>Please Input The Category name</small>
    {{--{{ Lang::get('help.HELP_TEXT', ['field'=>'category'])}}--}}
</div>
<div class="form-group">
    {{Form::label('description', "Description")}}
    {{Form::textarea('description', null,['class'=>'form-control','rows'=>'10', 'placeholder'=>'Enter Description'])}}
</div>
<div class="form-group">
    {{Form::label('rank', "Rank")}}
    {{Form::number('rank', null,['class'=>'form-control','placeholder'=>'Define Rank', 'min'=>1])}}
</div>
<div class="form-group">
    {{Form::label('radio', "Status")}}
    {{Form::radio('status',1,true)}}Active
    {{Form::radio('status',0)}}De-Active
</div>
<div class="form-group">
    {{Form::label('radio', "Child Type")}}
    {{Form::radio('child_type','sub-category',true)}}Sub Category
    {{Form::radio('child_type','product')}}Product
</div>
<div class="form-group">
    {{  Form::label('image',"Image")}}
    {{  Form::file('image',['id'=>'image'])}}
    {{--{{ Lang::get('help.HELP_TEXT', ['field'=>'category'])}}--}}
</div>
{{Form::button($submitButton,   ['type'=>'submit','class'=>'btn btn-primary'])}}
{{Form::button("Clear",         ['type'=>'submit','class'=>'btn btn-danger'])}}