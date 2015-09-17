@extends('app')


@section('content')
    @if($suggestion != null)
        <div class="col-md-8 col-sm-offset-2">
            <div class="well">
                <h2 class="text-info">{!! \App\Topic::find($suggestion->topic)->name !!}</h2>
                <p><span class="label label-success">POPULAR</span></p>
                <ul>
                    <li>Nivel :{!! \App\Level::find($suggestion->level)->name !!}</li>
                    <li>Materia: {!! \App\Subject::find($suggestion->subject)->name !!}</li>
                    <li>Grado: {!! \App\Grade::find($suggestion->grade)->name !!}</li>
                    <li>Dispositivo: {!! $suggestion->device !!}</li>
                </ul>
                <h3>Por: {!! link_to('profile/'.$suggestion->user_id,\App\User::find($suggestion->user_id)->username,null) !!}</h3>
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
                <!--{!! Form::open(['url' => 'plan']) !!}-->
                {!! Form::model($suggestion,['method' => 'POST','url' => 'plan','action' => 'PlanController@store']) !!}
                @include('partials.formplan',array('submitBtnTxt' => 'Agregar a mi plan'))
                {!! Form::close() !!}

            </div>
        </div>
        @if(!Auth::guest())
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    @include('partials.errors')
                    {!! Form::open(['url' => 'comments/'.$suggestion->id]) !!}
                    @include('partials.formcomment',array(  'userId' => Auth::user()->id,
                                                            'submitBtnTxt' => 'Comment'))
                    {!! Form::close() !!}
                </div>
            </div>
            @if($suggestion_comments != null)
                @foreach($suggestion_comments->chunk(1) as $Comment)
                <div class="row">
                    <div class="col-lg-6 col-md-offset-3">
                        @foreach($Comment as $comment)
                            <article class="media comment-media">
                                <div class="pull-left">
                                    <img class="media-object avatar-user" src="{!! \App\User::find($comment->user_id)->avatar !!}" alt=""/>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        {!! \App\User::find($comment->user_id)->username !!}
                                    </h4>
                                    <p>{!! $comment->created_at->diffForHumans() !!}</p>
                                    <hr/>
                                    {!! $comment->content !!}
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
                @endforeach
                {!! $suggestion_comments->render() !!}
            @endif
        @endif <!--END IF GUEST -->
    @endif

@stop