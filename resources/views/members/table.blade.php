<table class="table table-responsive" id="members" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th>Họ tên</th>
        <th>Email</th>
        <th>Số điện thoại</th>
        <th>Chức vụ</th>
        @if(Auth::user()->role == 4)
        <th>Sửa</th>
        <th>Xóa</th>
        @else
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($members as $members)
        <tr>
            <td>{!! $members->name !!}</td>
            <td>{!! $members->email !!}</td>
            <td>{!! $members->phone !!}</td>
            <td>{!! $members->roles->name !!}</td>
            @if(Auth::user()->role == 4)
            <td>
                {!! Form::open(['route' => ['members.destroy', $members->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('members.edit', [$members->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    
                </div>
                {!! Form::close() !!}
            </td> 
            @if(Auth::user()->id != $members->id)
            <td>
                {!! Form::open(['route' => ['members.destroy', $members->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Bạn có muốn xóa?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
            @else
            <td></td>
            @endif
            @else
            @endif
            
        </tr>
    @endforeach
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
    $('#members').DataTable( {
        "language": {
            "url": "http://localhost:8080/datn_devicemanager/public/data_table/language.json"
        }
    } );
} );
</script>