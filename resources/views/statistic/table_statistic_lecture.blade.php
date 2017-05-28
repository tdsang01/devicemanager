<table class="table table-responsive" id="statistic-lecture-table">
    <thead>
        <th>Người mượn</th>
        <th>Thiết bị</th>
        <th>Tiết bắt đầu</th>
        <th>Tiết kết thúc</th>
        <th>Ngày mượn</th>
        <th>Ngày trả</th>
        <th>Người cho mượn</th>
    </thead>
    <tbody>
    @foreach($statistic as $statistic)
        <tr>
            <td>{!! $statistic->borrower->name !!}</td>
            <td>{!! $statistic->device->name !!}</td>
            <td>{!! $statistic->periodofclassstart->name !!}</td>
            <td>{!! $statistic->periodofclassend->name !!}</td>
            <td>{!! $statistic->date_borrow !!}</td>
            <td>{!! $statistic->date_render !!}</td>
            <td>{!! $statistic->lender->name !!}</td>
        </tr>
    @endforeach	
    </tbody>
</table>