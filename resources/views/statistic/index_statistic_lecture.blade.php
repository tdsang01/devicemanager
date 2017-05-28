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
            <div class = "table_statistic_lecture">
              @include('statistic.table_statistic_lecture')
            </div>
        </div>
    </div>
@endsection

