@extends('app')


@section('content')
    @if($userprofile != null)
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="well profile">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-8">
                            <h2>{!! $userprofile->username !!}</h2>
                            <p><strong>Tipo: </strong><span class="tags">{!! $userprofile->position !!}</span></p>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center">
                            <figure>
                                <img src="{!! $userprofile->avatar !!}" alt="" class="img-circle img-responsive">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($suggestions != null)
            @foreach($suggestions->chunk(5) as $Suggestions)
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    @foreach($Suggestions as $suggestion)
                    <div class="list-group">
                            <a href="{{url('results/'.$suggestion->id)}}" class="list-group-item">
                                <h4 class="list-group-item-heading">Tema: {!! \App\Topic::find($suggestion->topic)->name !!}</h4>
                                <p class="list-group-item-text">
                                    Nivel: {!! \App\Level::find($suggestion->level)->name !!}</br>
                                    Grado: {!! \App\Grade::find($suggestion->grade)->name !!}</br>
                                    Materia: {!! \App\Subject::find($suggestion->subject)->name !!}</br>
                                </p>
                            </a>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            {!! $suggestions->render() !!}
        @endif
    @endif

@stop