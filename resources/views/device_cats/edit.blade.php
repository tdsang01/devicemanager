@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Danh mục thiết bị
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($deviceCats, ['route' => ['deviceCats.update', $deviceCats->id], 'method' => 'patch']) !!}

                        @include('device_cats.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection