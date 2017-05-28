@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Lịch sử mượn trả</h1>
        <h1 class="pull-right">
            @if ($currentUserRole == 3)
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('histories.create') !!}">Đăng ký mượn</a>
           @endif
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('histories.table')
            </div>
        </div>
    </div>
@endsection
