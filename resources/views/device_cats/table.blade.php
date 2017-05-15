<table class="table table-responsive" id="deviceCats-table">
    <thead>
        <th>Danh mục thiết bị</th>
        <th>Số lượng</th>
        <th colspan="3">Action</th>
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
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>