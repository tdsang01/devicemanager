<table class="table table-responsive" id="devices-table">
    <thead>
        <th>Tên thiết bị</th>
        <th>Phòng học</th>
        <th>Danh mục thiết bị</th>
        <th>Trạng thái</th>
        <th>Tình trạng</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($devices as $devices)
        <tr>
            <td>{!! $devices->name !!}</td>
            <td>{!! $devices->classroom->name !!}</td>
            <td>{!! $devices->devicecat->name !!}</td>
            <td>{!! $devices->devicelocation->name !!}</td>
            <td>{!! $devices->devicestatus->name !!}</td>
            <td>
                {!! Form::open(['route' => ['devices.destroy', $devices->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('devices.show', [$devices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('devices.edit', [$devices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

