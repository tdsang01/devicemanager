<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Phòng học:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('classrooms.index') !!}" class="btn btn-default">Hủy bỏ</a>
</div>
