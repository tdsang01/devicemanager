@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Thiết bị</h1>
        <h1 class="pull-right">
        @if(Auth::user()->role != 2)
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('devices.create') !!}">Thêm thiết bị</a>
        @endif
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('devices.table')
            </div>
        </div>
    </div>
@endsection
