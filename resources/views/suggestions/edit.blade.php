@extends('app')


@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            @include('partials.errors')
            <h1 class="page-heading">Edita tu sugerencia</h1>
            <hr/>
            <!-- {!! Form::open(['url' => 'ruta']) !!} -->
            {!! Form::model($suggestion,['method' => 'PATCH', 'action' => ['SuggestionController@update',$suggestion->id]]) !!}
            @include('partials.editform',['submitBtnTxt' => 'Update'])
            {!! Form::close() !!}

        </div>
    </div>
@stop