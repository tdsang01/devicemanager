<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Danh mục thiết bị:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Quantity Field -->
<div class="form-group col-sm-6">
    {!! Form::label('quantity', 'Số lượng:') !!}
    {!! Form::text('quantity', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('deviceCats.index') !!}" class="btn btn-default">Hủy bỏ</a>
</div>
