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
        <option value="{!! $classroom->id !!}">{!! $classroom->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Id Devicecat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_devicecat', 'Danh mục thiết bị:') !!}
    <select name="id_devicecat" class="form-control">
        @foreach($devicecats as $devicecat)
        <option value="{!! $devicecat->id !!}">{!! $devicecat->name !!}</option>
        @endforeach
    </select>
</div>

<!-- Id Devicelocation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_devicelocation', 'Trạng thái:') !!}
    <select name="id_devicelocation" class="form-control">
        @foreach($devicelocations as $devicelocation)
        <option value="{!! $devicelocation->id !!}">{!! $devicelocation->name !!}</option>
        @endforeach
    </select>

</div>

<!-- Id DeviceStatus Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_devicestatus', 'Tình trạng:') !!}
    <select name="id_devicestatus" class="form-control">
        @foreach($devicestatuses as $devicestatus)
        <option value="{!! $devicestatus->id !!}">{!! $devicestatus->name !!}</option>
        @endforeach
    </select>

</div>

<!-- Date Entry Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_entry', 'Ngày nhập về:') !!}
    {!! Form::text('date_entry', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Using Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_using', 'Ngày sử dụng:') !!}
    {!! Form::text('date_using', null, ['class' => 'form-control']) !!}
</div>

<!-- Date Warranty Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date_warranty', 'Ngày hết bảo hành:') !!}
    {!! Form::text('date_warranty', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('devices.index') !!}" class="btn btn-default">Cancel</a>
</div>
