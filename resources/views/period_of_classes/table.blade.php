<table class="table table-responsive" id="periodOfClasses-table">
    <thead>
        <th>Tiết học</th>
        <th>Thời gian bắt đầu</th>
        <th>Thời gian kết thúc</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($periodOfClasses as $periodOfClasses)
        <tr>
            <td>{!! $periodOfClasses->name !!}</td>
            <td>{!! $periodOfClasses->timestart !!}</td>
            <td>{!! $periodOfClasses->timeend !!}</td>
            <td>
                {!! Form::open(['route' => ['periodOfClasses.destroy', $periodOfClasses->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('periodOfClasses.show', [$periodOfClasses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('periodOfClasses.edit', [$periodOfClasses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>