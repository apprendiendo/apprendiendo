@extends('app')


@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            @include('partials.errors')
            <h1 class="page-heading">Crea una Sugerencia</h1>
            <hr/>
            <!-- {!! Form::open(['url' => 'ruta']) !!} ['url' => 'suggestions','files'=> true]-->
            {!! Form::open(array('url' => 'suggestions','files' => true )) !!}
                    @include('partials.createform',['submitBtnTxt' => 'Create',''])
            {!! Form::close() !!}

        </div>
    </div>
@stop