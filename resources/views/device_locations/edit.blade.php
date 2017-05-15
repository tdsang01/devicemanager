@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Device Location
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($deviceLocation, ['route' => ['deviceLocations.update', $deviceLocation->id], 'method' => 'patch']) !!}

                        @include('device_locations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection