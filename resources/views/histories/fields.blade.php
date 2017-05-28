<!-- Id Device Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_device', 'Thiết bị:') !!}
    <select name="id_device" class="form-control">
        @foreach($devices as $device)
        <option value="{!! $device->id !!}">{!! $device->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Id Borrower Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_borrower', 'Người mượn:') !!}
    <select name="id_borrower" class="form-control">
        @foreach($users as $user)
        <option value="{!! $user->id !!}">{!! $user->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Id Periodstart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_periodstart', 'Tiết bắt đầu:') !!}
    <select name="id_periodstart" class="form-control" id = "id_periodstart">
        @foreach($periodofclasses as $periodofclass)
        <option value="{!! $periodofclass->id !!}">{!! $periodofclass->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Id Periodend Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_periodend', 'Tiết kết thúc:') !!}
    <select name="id_periodend" class="form-control" id="id_periodend" >
        @foreach($periodofclasses as $periodofclass)
        <option value="{!! $periodofclass->id !!}" id = "{!! $periodofclass->id !!}">{!! $periodofclass->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Date Field 
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control']) !!}
</div>

Id Lender Field
<div class="form-group col-sm-6">
    {!! Form::label('id_lender', 'Id Lender:') !!}
    {!! Form::text('id_lender', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Cho mượn', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('histories.index') !!}" class="btn btn-default">Hủy bỏ</a>
</div>
