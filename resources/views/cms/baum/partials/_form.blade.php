<div class="form-group">
    <div class="form-group">
        {{Form::label('name',"Name")}}
        {{Form::text('name', null,['class'=>'form-control','placeholder'=>'Enter Name'])}}
        {!! Lang::get('help.HELP_TEXT', ['field'=>'Category'])!!}
    </div>
</div>
{{Form::button($submitButton,   ['type'=>'submit','class'=>'btn btn-primary'])}}
{{Form::button("Clear",         ['type'=>'reset','class'=>'btn btn-danger'])}}

