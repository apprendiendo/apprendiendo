@extends('app')


@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            @include('partials.errors')
            <h1 class="page-heading">Edita tu sugerencia</h1>
            <hr/>
            <!-- {!! Form::open(['url' => 'ruta']) !!} -->
            {!! Form::model($myprofile,['method' => 'PATCH', 'action' => ['ProfileController@update',$myprofile->id]]) !!}
            @include('partials.formprofile',['submitBtnTxt' => 'Update'])
            {!! Form::close() !!}
        </div>
    </div>
@stop