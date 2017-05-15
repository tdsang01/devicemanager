@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Tiết học
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'periodOfClasses.store']) !!}

                        @include('period_of_classes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
