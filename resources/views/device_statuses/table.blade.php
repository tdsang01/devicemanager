<table class="table table-responsive" id="deviceStatuses-table">
    <thead>
        <th>Tình trạng</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($deviceStatuses as $deviceStatuses)
        <tr>
            <td>{!! $deviceStatuses->name !!}</td>
            <td>
                {!! Form::open(['route' => ['deviceStatuses.destroy', $deviceStatuses->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('deviceStatuses.show', [$deviceStatuses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('deviceStatuses.edit', [$deviceStatuses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>