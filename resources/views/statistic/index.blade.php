@extends('layouts.app')

@section('content')
    <section class="content-header"> 
        <h1 class="pull-left">Thống kê</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body" >
                   <div>
                   		<select name = "statistic" class = "statistic" >
                   			<option value = "0">Chọn thống kê:</option>
                        <option value = "time">Thống kê theo thời gian</option>
                   			<option value = "lecture">Thống kê theo giảng viên</option>
                   			<option value = "frequency">Thống kê theo tần suất sử dụng</option>
                   			<option value = "borrowing">Thống kê các thiết bị đang mượn</option>
                   		</select>
                   		<div class = "all_lecture">
                   			<select name = "all_lecture">
	                   			<option value = "0">Chọn giảng viên:</option>
                   			</select>
                   		</div>
                   		<div class = 'time'>
                   			Nhập thời gian bắt đầu:
	                   		<input type = 'date' id = 'time_start' onchange = "timeChange()"/>
	                   		Nhập thời gian kết thúc:
	                   		<input type = 'date' id = 'time_end' onchange = "timeChange()"/>
                   		</div>
                      
                   </div>
            </div>
            <div class = "frequency_table_statistic">
              @include('statistic.table_frequency')
            </div>
            
            <div class = "table_statistic">
              @include('statistic.table')
            </div>
        </div>
    </div>
@endsection

