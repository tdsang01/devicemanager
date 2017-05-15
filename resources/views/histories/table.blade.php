<table class="table table-responsive" id="histories-table">
    <thead>
        <th>Thiết bị</th>
        <th>Người mượn</th>
        <th>Ngày mượn</th>
        <th>Tiết bắt đầu</th>
        <th>Tiết kết thúc</th>
        <th>Người cho mượn</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($histories as $histories)
        <tr>
            <td>{!! $histories->device->name !!}</td>
            <td>{!! $histories->borrower->name !!}</td>
            <td>{!! $histories->date !!}</td>
            <td>{!! $histories->periodofclassstart->name !!}</td>
            <td>{!! $histories->periodofclassend->name !!}</td>
            <td>{!! $histories->lender->name !!}</td>
            <td>
                {!! Form::open(['route' => ['histories.destroy', $histories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- 
                    <a href="{!! route('histories.edit', [$histories->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a> -->
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>