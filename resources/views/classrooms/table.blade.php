<table class="table table-responsive" id="classrooms-table">
    <thead>
        <th class = 'col-sm-11'>Phòng học</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </thead>
    <tbody>
    @foreach($classrooms as $classrooms)
    @if ($classrooms->id != 0)
        <tr>
            <td>{!! $classrooms->name !!}</td>
            <td>
                {!! Form::open(['route' => ['classrooms.destroy', $classrooms->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('classrooms.show', [$classrooms->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('classrooms.edit', [$classrooms->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    
                </div>
                {!! Form::close() !!}
            </td>
            <td>
                {!! Form::open(['route' => ['classrooms.destroy', $classrooms->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('classrooms.show', [$classrooms->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Bạn có muốn xóa?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endif
    @endforeach
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
    $('#classrooms-table').DataTable( {
        "language": {
            "url": "http://localhost:8080/datn_devicemanager/public/data_table/language.json"
        }
    } );
} );
</script>