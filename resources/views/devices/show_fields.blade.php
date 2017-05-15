<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Tên thiết bị:') !!}
    <p>{!! $devices->name !!}</p>
</div>

<!-- Id Classroom Field -->
<div class="form-group">
    {!! Form::label('id_classroom', 'Phòng học:') !!}
    <p>{!! $devices->classroom->name !!}</p>
</div>

<!-- Id Devicecat Field -->
<div class="form-group">
    {!! Form::label('id_devicecat', 'Danh mục thiết bị:') !!}
    <p>{!! $devices->devicecat->name !!}</p>
</div>

<!-- Id Devicelocation Field -->
<div class="form-group">
    {!! Form::label('id_devicelocation', 'Trạng thái:') !!}
    <p>{!! $devices->devicelocation->name !!}</p>
</div>

<!-- Id Devicestatus Field -->
<div class="form-group">
    {!! Form::label('id_devicestatus', 'Trạng thái:') !!}
    <p>{!! $devices->devicestatus->name !!}</p>
</div>

<!-- Date Entry Field -->
<div class="form-group">
    {!! Form::label('date_entry', 'Ngày nhập về:') !!}
    <p>{!! $devices->date_entry !!}</p>
</div>

<!-- Date Using Field -->
<div class="form-group">
    {!! Form::label('date_using', 'Ngày sử dụng:') !!}
    <p>{!! $devices->date_using !!}</p>
</div>

<!-- Date Warranty Field -->
<div class="form-group">
    {!! Form::label('date_warranty', 'Ngày hết bảo hành:') !!}
    <p>{!! $devices->date_warranty !!}</p>
</div>

