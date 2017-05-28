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
        @endif
        @if(Auth::user()->role == 2)
        <th>Báo hỏng</th>
        @endif
    </thead>
    <tbody>
    @foreach($histories as $histories)
        @if (2 != $currentUserRole) 
            <tr>
                <td>{!! $histories->device->name !!}</td>
                <td>{!! $histories->borrower->name !!}</td>
                <td>{!! $histories->periodofclassstart->name !!}</td>
                <td>{!! $histories->periodofclassend->name !!}</td>
                <td>{!! $histories->date_borrow !!}</td>
                <td>{!! $histories->date_render !!}</td>
                <td>{!! $histories->lender->name !!}</td>
                <td style='text-align: center'>
                    {!! Form::open(['route' => ['histories.destroy', $histories->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        @if($histories->device->id_devicestatus != 1 
                        && $histories->date_render === 'Chưa trả' 
                        && $currentUserRole == 3)
                        	<a href="{{ route('trathietbi', $histories->id) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        @endif
                    </div>
                    {!! Form::close() !!}
                </td>
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
            </tr>     
        @else
            @if ($histories->id_borrower == $currentUserId)
                <tr>
                    <td>{!! $histories->device->name !!}</td>
                    <td>{!! $histories->borrower->name !!}</td>
                    <td>{!! $histories->periodofclassstart->name !!}</td>
                    <td>{!! $histories->periodofclassend->name !!}</td>
                    <td>{!! $histories->date_borrow !!}</td>
                    <td>{!! $histories->date_render !!}</td>
                    <td>{!! $histories->lender->name !!}</td>
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
                </tr> 
            @endif
        @endif
    @endforeach
    </tbody>
</table>