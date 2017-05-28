<table class="table table-responsive" id="deviceCats-table">
    <thead>
        <th class = 'col-sm-7'>Danh mục thiết bị</th>
        <th class = 'col-sm-4'>Số lượng</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </thead>
    <tbody>
    @foreach($deviceCats as $deviceCats)
        <tr>
            <td>{!! $deviceCats->name !!}</td>
            <td>{!! $deviceCats->quantity !!}</td>
            <td>
                {!! Form::open(['route' => ['deviceCats.destroy', $deviceCats->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('deviceCats.edit', [$deviceCats->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                </div>
                {!! Form::close() !!}
            </td>
            <td>
                {!! Form::open(['route' => ['deviceCats.destroy', $deviceCats->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Bạn có muốn xóa?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>