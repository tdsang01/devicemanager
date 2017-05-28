<table class="table table-responsive" id="devices-table">
    <thead>
        <th class = 'col-sm-3'>Tên thiết bị</th>
        <th>Phòng học</th>
        <th class = 'col-sm-3'>Danh mục thiết bị</th>
        <th >Trạng thái</th>
        <th class = 'col-sm-1'>Tình trạng</th>
        <th>Chi tiết</th>
        @if(Auth::user()->role != 2)
        <th>Sửa</th>
        <th>Xóa</th>
        @endif
        <th>Xem sửa chữa</th>
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
                </div>
                {!! Form::close() !!}
            </td>
            @if(Auth::user()->role != 2)
            <td>
                {!! Form::open(['route' => ['devices.destroy', $devices->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('devices.edit', [$devices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
            
            <td>
                {!! Form::open(['route' => ['devices.destroy', $devices->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Bạn có muốn xóa?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            @endif
            <td>
                {!! Form::open(['route' => ['devices.destroy', $devices->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('view_repair_by_id', [$devices->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

