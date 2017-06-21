<!-- Id Devicecat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_devicecat', 'Danh mục thiết bị:') !!}
    <select name="id_devicecat" class="form-control">
        @foreach($devicecats as $devicecat)
        <option @if(($devicecat->id) === ($devices->devicecat->id)) selected @endif value="{!! $devicecat->id !!}">{!! $devicecat->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Tên thiết bị:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Classroom Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_classroom', 'Phòng học:') !!}
    <select name="id_classroom" class="form-control">
        @foreach($classrooms as $classroom)
        <option @if(($classroom->id) === ($devices->classroom->id)) selected @endif value="{!! $classroom->id !!}">{!! $classroom->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Id Devicelocation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_devicelocation', 'Trạng thái:') !!}
    <select name="id_devicelocation" class="form-control">
        @foreach($devicelocations as $devicelocation)
        <option @if(($devicelocation->id) === ($devices->devicelocation->id)) selected @endif value="{!! $devicelocation->id !!}">{!! $devicelocation->name !!}</option>
        @endforeach
    </select>

</div>

<!-- Id Devicestatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_devicestatus', 'Tình trạng:') !!}
    <select name="id_devicestatus" class="form-control">
        @foreach($devicestatuses as $devicestatus)
        <option @if(($devicestatus->id) === ($devices->devicestatus->id)) selected @endif value="{!! $devicestatus->id !!}">{!! $devicestatus->name !!}</option>
        @endforeach
    </select>

</div>

<!-- Date Entry Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_entry', 'Ngày nhập về:') !!}
    {!! Form::date('date_entry', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Using Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_using', 'Ngày sử dụng:') !!}
    {!! Form::date('date_using', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Warranty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_warranty', 'Ngày hết bảo hành:') !!}
    {!! Form::date('date_warranty', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('devices.index') !!}" class="btn btn-default">Hủy bỏ</a>
</div>
