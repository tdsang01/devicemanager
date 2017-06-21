<!-- Id Device Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('id_device', 'Id Device:') !!}
    {!! Form::text('id_device', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Id Reporter Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('id_reporter', 'Id Reporter:') !!}
    {!! Form::text('id_reporter', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Date Report Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('date_report', 'Date Report:') !!}
    {!! Form::text('date_report', null, ['class' => 'form-control']) !!}
</div>
 -->
<!-- Id Repairer Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('id_repairer', 'Id Repairer:') !!}
    {!! Form::text('id_repairer', null, ['class' => 'form-control']) !!}
</div> -->

<!-- Date Repair Field -->
<!-- <div class="form-group col-sm-6">
    {!! Form::label('date_repair', 'Date Repair:') !!}
    {!! Form::text('date_repair', null, ['class' => 'form-control']) !!}
</div> -->
<div class="form-group">
    {!! Form::hidden('id_device', $id_device, ['class' =>'form-control'])!!}
</div>
<!-- Description Field --> 
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('histories.index') !!}" class="btn btn-default">Hủy bỏ</a>
</div>
