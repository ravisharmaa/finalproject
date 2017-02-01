<div class="form-group">
    {{Form::label('name',"Name")}}
    {{Form::text('name', null,['class'=>'form-control','placeholder'=>'Enter Name'])}}
    {!! Lang::get('help.HELP_TEXT', ['field'=>'Category'])!!}

    <div class="form-group">
        {{Form::label('radio', "Has Child?")}}
        {{Form::radio('child_type','Yes',true,['id'=>'child-check'])}}Yes
        {{Form::radio('child_type','No',true,['id'=>'child-check'])}}No
    </div>
</div>

{{Form::button($submitButton,   ['type'=>'submit','class'=>'btn btn-primary'])}}
{{Form::button("Clear",         ['type'=>'submit','class'=>'btn btn-danger'])}}

