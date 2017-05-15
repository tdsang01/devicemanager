<table class="table table-responsive" id="members-table">
    <thead>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Chức vụ</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($members as $members)
        <tr>
            <td>{!! $members->name !!}</td>
            <td>{!! $members->email !!}</td>
            <td>{!! $members->phone !!}</td>
            <td>{!! $members->roles->name !!}</td>
            <td>
                {!! Form::open(['route' => ['members.destroy', $members->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('members.edit', [$members->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>