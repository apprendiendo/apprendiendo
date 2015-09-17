@extends('app')


@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            @include('partials.errors')
            <h1 class="page-heading">Busqueda general</h1>
            <hr/>
            <!-- ['url' => 'results', 'method' => 'GET'] -->

            <!-- ['method' => 'GET', 'action' => 'SearchController@results'] -->
            <!-- {!! Form::open(['url' => 'ruta']) !!}  'action' => ['SuggestionController@update',$suggestion->id] -->
            {!! Form::open(['method' => 'GET', 'action' => 'SearchController@general_results']) !!}
            @include('partials.general_search',['submitBtnTxt' => 'Search'])
            {!! Form::close() !!}

        </div>
    </div>
@stop