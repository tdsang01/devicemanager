@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Danh mục thiết bị</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('deviceCats.create') !!}">Thêm danh mục</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('device_cats.table')
            </div>
        </div>
    </div>
@endsection

