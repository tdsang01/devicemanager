<table class="table table-responsive" id="repairs-table">
    <thead>
        <th>Thiết bị</th>
        <th>Người báo hỏng</th>
        <th>Ngày báo hỏng</th>
        <th>Người sửa chữa</th>
        <th>Ngày sửa chữa</th>
        <th>Mô tả</th>
        <th>Sửa chữa</th>
    </thead>
    <tbody>
    @foreach($repairs as $repairs)
        <tr>
            <td>{!! $repairs->device->name !!}</td>
            <td>{!! $repairs->reporter->name !!}</td>
            <td>{!! $repairs->date_report !!}</td>
            @if($repairs->id_repairer != null)
                <td>{!! $repairs->repairer->name !!}</td>
            @else
                <td></td>
            @endif
            <td>{!! $repairs->date_repair !!}</td>
            <td>{!! $repairs->description !!}</td>
            @if($repairs->id_repairer == null && $currentUserRole != 2)
                <td>
                {!! Form::open(['route' => ['repairs.destroy', $repairs->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('repairs.show', [$repairs->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('repairs_device', [$repairs->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                </div>
                {!! Form::close() !!}
            </td>
            @else
                <td></td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
    $('#repairs-table').DataTable( {
        "language": {
            "url": "http://localhost:8080/datn_devicemanager/public/data_table/language.json"
        }
    } );
} );
</script>