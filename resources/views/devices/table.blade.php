<table class="table table-responsive" id="devices-table">
    <thead>
        <th>Tên thiết bị</th>
        <th>Phòng học</th>
        <th>Danh mục thiết bị</th>
        <th>Trạng thái</th>
        <th>Tình trạng</th>
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
            <td style = 'text-align:center'>
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
            <td style = 'text-align:center'>
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

<script type="text/javascript">
    $(document).ready(function() {
    $('#devices-table').DataTable( {
        "language": {
            "url": "http://localhost:8080/datn_devicemanager/public/data_table/language.json"
        }
    } );
} );
</script>