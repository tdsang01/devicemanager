@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Lịch sử mượn trả
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($histories, ['route' => ['histories.update', $histories->id], 'method' => 'patch']) !!}

                        @include('histories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection