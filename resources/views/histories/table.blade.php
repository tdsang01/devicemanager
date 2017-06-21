<table class="table table-responsive" id="histories-table">
    <thead>
        <th>Thiết bị</th>
        <th>Người mượn</th>
        <th>Tiết bắt đầu</th>
        <th>Tiết kết thúc</th>
        <th>Ngày mượn</th>
        <th>Ngày trả</th>
        <th>Người cho mượn</th>
        @if(Auth::user()->role == 3)
        <th>Trả thiết bị</th>
        @else
        @endif
        @if(Auth::user()->role == 2)
        <th>Báo hỏng</th>
        @else
        @endif
    </thead>
    <tbody>
    @foreach($histories as $histories)     
         @if(Auth::user()->role !=2)
        <tr>
            <td>{!! $histories->device->name !!}</td>
            <td>{!! $histories->borrower->name !!}</td>
            <td>{!! $histories->periodofclassstart->name !!}</td>
            <td>{!! $histories->periodofclassend->name !!}</td>
            <td>{!! $histories->date_borrow !!}</td>
            <td>{!! $histories->date_render !!}</td>
            <td>{!! $histories->lender->name !!}</td>
            @if(Auth::user()->role == 3)
            <td style='text-align: center'>
                {!! Form::open(['route' => ['histories.destroy', $histories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @if($histories->date_render === 'Chưa trả' 
                    && $currentUserRole == 3)
                    	<a href="{{ route('trathietbi', $histories->id) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
            @else
            @endif 
            @if(Auth::user()->role == 2) 
            <td style='text-align: center'>
                {!! Form::open(['route' => ['histories.destroy', $histories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @if($histories->device->id_devicestatus != 3 
                    && $histories->date_render === 'Chưa trả' 
                    && $currentUserRole == 2)
                    	<a href="{{ route('report', [$histories->id_device]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
            @else
            @endif
        </tr>    
        @elseif(Auth::user()->role == 2 && Auth::user()->id == $histories->id_borrower)   
        <tr>
            <td>{!! $histories->device->name !!}</td>
            <td>{!! $histories->borrower->name !!}</td>
            <td>{!! $histories->periodofclassstart->name !!}</td>
            <td>{!! $histories->periodofclassend->name !!}</td>
            <td>{!! $histories->date_borrow !!}</td>
            <td>{!! $histories->date_render !!}</td>
            <td>{!! $histories->lender->name !!}</td>
            @if(Auth::user()->role == 3)
            <td style='text-align: center'>
                {!! Form::open(['route' => ['histories.destroy', $histories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @if($histories->device->id_devicestatus == 2 
                    && $histories->date_render === 'Chưa trả' 
                    && $currentUserRole == 3)
                        <a href="{{ route('trathietbi', $histories->id) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
            @else
            @endif 
            @if(Auth::user()->role == 2) 
            <td style='text-align: center'>
                {!! Form::open(['route' => ['histories.destroy', $histories->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @if($histories->device->id_devicestatus != 3 
                    && $histories->date_render === 'Chưa trả' 
                    && $currentUserRole == 2)
                        <a href="{{ route('report', [$histories->id_device]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        
                    @endif
                </div>
                {!! Form::close() !!}
            </td>
            @else
            @endif
        </tr> 
        @endif
    @endforeach
    </tbody>
</table>

<script type="text/javascript">
    $(document).ready(function() {
    $('#histories-table').DataTable( {
        "language": {
            "url": "http://localhost:8080/datn_devicemanager/public/data_table/language.json"
        }
    } );
} );
</script>