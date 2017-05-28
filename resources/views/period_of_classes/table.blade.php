<table class="table table-responsive" id="periodOfClasses-table">
    <thead>
        <th class = 'col-sm-4'>Tiết học</th>
        <th class = 'col-sm-4'>Thời gian bắt đầu</th>
        <th class = 'col-sm-4'>Thời gian kết thúc</th>
        <th>Sửa</th>
        <th>Xóa</th>
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
                </div>
                {!! Form::close() !!}
            </td>
            <td>
                {!! Form::open(['route' => ['periodOfClasses.destroy', $periodOfClasses->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('periodOfClasses.show', [$periodOfClasses->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Bạn có muốn xóa?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>