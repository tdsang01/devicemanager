<li class="{{ Request::is('members*') ? 'active' : '' }}">
    <a href="{!! route('members.index') !!}"><i class="fa fa-edit"></i><span>QUẢN LÝ NGƯỜI DÙNG</span></a>
</li>

<!-- <li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Chức vụ</span></a>
</li> -->

<li class="{{ Request::is('classrooms*') ? 'active' : '' }}">
    <a href="{!! route('classrooms.index') !!}"><i class="fa fa-edit"></i><span>QUẢN LÝ PHÒNG HỌC</span></a>
</li>

<li class="{{ Request::is('periodOfClasses*') ? 'active' : '' }}">
    <a href="{!! route('periodOfClasses.index') !!}"><i class="fa fa-edit"></i><span>QUẢN LÝ TIẾT HỌC</span></a>
</li>

<li class="{{ Request::is('deviceCats*') ? 'active' : '' }}">
    <a href="{!! route('deviceCats.index') !!}"><i class="fa fa-edit"></i><span>DANH MỤC THIẾT BỊ</span></a>
</li>

<!-- <li class="{{ Request::is('deviceLocations*') ? 'active' : '' }}">
    <a href="{!! route('deviceLocations.index') !!}"><i class="fa fa-edit"></i><span>Trạng thái</span></a>
</li> -->

<!-- <li class="{{ Request::is('deviceStatuses*') ? 'active' : '' }}">
    <a href="{!! route('deviceStatuses.index') !!}"><i class="fa fa-edit"></i><span>Tình trạng thiết bị</span></a>
</li> -->

<li class="{{ Request::is('devices*') ? 'active' : '' }}">
    <a href="{!! route('devices.index') !!}"><i class="fa fa-edit"></i><span>QUẢN LÝ THIẾT BỊ</span></a>
</li>



<li class="{{ Request::is('histories*') ? 'active' : '' }}">
    <a href="{!! route('histories.index') !!}"><i class="fa fa-edit"></i><span>QUẢN LÝ MƯỢN TRẢ</span></a>
</li>
@if(Auth::user()->role != 2)
<li class="{{ Request::is('repairs*') ? 'active' : '' }}">
    <a href="{!! route('repairs.index') !!}"><i class="fa fa-edit"></i><span>QUẢN LÝ SỬA CHỮA</span></a>
</li>
@else
@endif

@if(Auth::user()->role != 2)
<li class="{{ Request::is('statistic*') ? 'active' : '' }}">
    <a href="{!! route('statistic') !!}"><i class="fa fa-edit"></i><span>THỐNG KÊ</span></a>
</li>
@else
<li class="{{ Request::is('statistic*') ? 'active' : '' }}">
    <a href="{!! route('statistic_current_lecture', [Auth::user()->id]) !!}"><i class="fa fa-edit"></i><span>THỐNG KÊ</span></a>
</li>
@endif