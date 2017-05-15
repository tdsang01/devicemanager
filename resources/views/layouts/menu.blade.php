<li class="{{ Request::is('members*') ? 'active' : '' }}">
    <a href="{!! route('members.index') !!}"><i class="fa fa-edit"></i><span>Người dùng</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Chức vụ</span></a>
</li>

<li class="{{ Request::is('classrooms*') ? 'active' : '' }}">
    <a href="{!! route('classrooms.index') !!}"><i class="fa fa-edit"></i><span>Phòng học</span></a>
</li>

<li class="{{ Request::is('deviceCats*') ? 'active' : '' }}">
    <a href="{!! route('deviceCats.index') !!}"><i class="fa fa-edit"></i><span>Danh mục thiết bị</span></a>
</li>

<!-- <li class="{{ Request::is('deviceLocations*') ? 'active' : '' }}">
    <a href="{!! route('deviceLocations.index') !!}"><i class="fa fa-edit"></i><span>Trạng thái</span></a>
</li> -->

<li class="{{ Request::is('deviceStatuses*') ? 'active' : '' }}">
    <a href="{!! route('deviceStatuses.index') !!}"><i class="fa fa-edit"></i><span>Tình trạng thiết bị</span></a>
</li>

<li class="{{ Request::is('devices*') ? 'active' : '' }}">
    <a href="{!! route('devices.index') !!}"><i class="fa fa-edit"></i><span>Thiết bị</span></a>
</li>

<li class="{{ Request::is('periodOfClasses*') ? 'active' : '' }}">
    <a href="{!! route('periodOfClasses.index') !!}"><i class="fa fa-edit"></i><span>Tiết học</span></a>
</li>

<li class="{{ Request::is('histories*') ? 'active' : '' }}">
    <a href="{!! route('histories.index') !!}"><i class="fa fa-edit"></i><span>Lịch sử mượn trả</span></a>
</li>


