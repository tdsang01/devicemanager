<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tiết học:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Timestart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timestart', 'Thời gian bắt đầu:') !!}
    {!! Form::time('timestart', null, ['class' => 'form-control']) !!}
</div>

<!-- Timeend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timeend', 'Thời gian kết thúc:') !!}
    {!! Form::time('timeend', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('periodOfClasses.index') !!}" class="btn btn-default">Hủy bỏ</a>
</div>
