@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tình trạng thiết bị
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($deviceStatuses, ['route' => ['deviceStatuses.update', $deviceStatuses->id], 'method' => 'patch']) !!}

                        @include('device_statuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection