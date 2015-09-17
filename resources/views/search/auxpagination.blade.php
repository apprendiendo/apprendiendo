@extends('app')


@section('content')
    @if($suggestions != null)
        <h1 class="page-heading">Número de resultados {!! count($suggestions) !!}</h1>
        @foreach($suggestions->chunk(5) as $Suggestions)
            <div class="row">
                <div class="col-lg-12">
                    @foreach($Suggestions as $suggestion)
                        <div id="postlist">
                            <div class="panel">
                                <div class="panel-heading">
                                    <div class="text-center">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <h3 class="pull-left">{!! \App\Topic::find($suggestion->topic)->name !!}</h3>
                                            </div>
                                            <div class="col-sm-3">
                                                <h4 class="pull-right">
                                                    <small><em>{!! $suggestion->created_at->format('Y-m-d') !!}</em></small>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">{!! $suggestion->how_to_use !!}</div>
                                @if(Auth::guest())
                                    <div class="panel-footer"><span class="label label-default">Por: {!! \App\User::find($suggestion->user_id)->name !!}</span><span class="label label-success pull-right">{!! link_to('/auth/login','Ver',null) !!}</span></div>
                                @else
                                    <div class="panel-footer"><span class="label label-default">Por: {!! \App\User::find($suggestion->user_id)->name !!}</span><span class="label label-success pull-right">{!! link_to('results/' .$suggestion->id ,'Ver',null) !!}</span></div>

                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
        {!! $suggestions->render() !!}
    @elseif(!$suggestions)
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1 class="page-heading">No has hecho ninguna sugencia</h1>
                </div>
            </div>
        </div>
    @endif
@stop