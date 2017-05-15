@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Thiết bị
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($devices, ['route' => ['devices.update', $devices->id], 'method' => 'patch']) !!}

                        @include('devices.fields_edit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection