<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tiết học:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Timestart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timestart', 'Thời gian bắt đầu:') !!}
    {!! Form::text('timestart', null, ['class' => 'form-control']) !!}
</div>

<!-- Timeend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timeend', 'Thời gian kết thúc:') !!}
    {!! Form::text('timeend', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('periodOfClasses.index') !!}" class="btn btn-default">Cancel</a>
</div>
