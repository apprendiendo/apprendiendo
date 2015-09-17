@extends('app')


@section('content')
    @if($suggestion != null)
        <div class="row">
            <div class="col-md-8 col-sm-offset-2">
                <div class="well">
                    <h2 class="text-info">{!! App\Topic::find($suggestion->topic)->name !!}</h2>
                    <p><span class="label label-success">POPULAR</span></p>
                    <ul>
                        <li>Nivel :{!! App\Level::find($suggestion->level)->name !!}</li>
                        <li>Grado: {!! App\Grade::find($suggestion->grade)->name !!}</li>
                        <li>Materia: {!! App\Subject::find($suggestion->subject)->name !!}</li>
                        <li>Dispositivo: {!! $suggestion->device !!}</li>
                    </ul>
                    <div class="row">
                        @if($suggestion->app_url != null)
                            <div class="col-lg-4">
                                <a href="{!! $suggestion->app_url !!}">
                                    <h4 class="text-info">{!! $suggestion->app_title !!}</h4>
                                    <p>{!! $suggestion->app_description !!}</p>
                                    <img src="{!! $suggestion->app_image !!}" height="150" width="150"/>
                                </a>

                            </div>
                        @endif
                        @if($suggestion->ebook_url != null)
                            <div class="col-lg-4">
                                <a href="{!! $suggestion->ebook_url !!}">
                                    <h4 class="text-info">{!! $suggestion->ebook_title !!}</h4>
                                    <p>{!! $suggestion->ebook_description !!}</p>
                                    <img src="{!! $suggestion->ebook_image !!}" height="150" width="150"/>
                                </a>

                            </div>
                        @endif
                        @if($suggestion->video_url != null)
                            <div class="col-lg-4">
                                <a href="{!! $suggestion->video_url !!}">
                                    <h4 class="text-info">{!! $suggestion->video_title !!}</h4>
                                    <p>{!! $suggestion->video_description !!}</p>
                                    <img src="{!! $suggestion->video_image !!}" height="150" width="150"/>
                                </a>
                            </div>
                        @endif
                    </div>
                    <hr>
                    <h3>Sugerencia de uso</h3>
                    <p>{!! $suggestion->how_to_use !!}</p>
                    <hr>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-offset-2">
                    {!! link_to('suggestions/' .$suggestion->id. '/edit', 'Update',array('class' => 'btn btn-lg btn-primary center-block')) !!}
            </div>
        </div>

    @endif

@stop