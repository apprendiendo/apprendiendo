@extends('app')


@section('content')
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            @include('partials.errors')
            <h1 class="page-heading">Busca una Sugerencia</h1>
            <hr/>
            @if(!Auth::guest())
            <ul class="list-group">
                <li class="list-group-item">{!! Auth::user()->username!!}</li>
                <li class="list-group-item">{!! Auth::user()->email!!}</li>
                <li class="list-group-item"><img class="img-rounded" alt="" src="{!! Auth::user()->avatar!!}"/></li>
            </ul>
            @endif
        </div>
    </div>
@stop