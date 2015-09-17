@extends('app')


@section('content')
    @if($plan != null)
        <div class="col-md-8 col-sm-offset-2">
            <div class="well">
                <h2 class="text-info">{!! \App\Topic::find($plan->topic)->name !!}</h2>
                <p><span class="label label-success">POPULAR</span></p>
                <div class="row">
                    @if($plan->app_url != null)
                        <div class="col-lg-4">
                            <a href="{!! $plan->app_url !!}">
                                <h4 class="text-info">{!! $plan->app_title !!}</h4>
                                <p>{!! $plan->app_description !!}</p>
                                <img src="{!! $plan->app_image !!}" height="150" width="150"/>
                            </a>

                        </div>
                    @endif
                    @if($plan->ebook_url != null)
                        <div class="col-lg-4">
                            <a href="{!! $plan->ebook_url !!}">
                                <h4 class="text-info">{!! $plan->ebook_title !!}</h4>
                                <p>{!! $plan->ebook_description !!}</p>
                                <img src="{!! $plan->ebook_image !!}" height="150" width="150"/>
                            </a>

                        </div>
                    @endif
                    @if($plan->video_url != null)
                        <div class="col-lg-4">
                            <a href="{!! $plan->video_url !!}">
                                <h4 class="text-info">{!! $plan->video_title !!}</h4>
                                <p>{!! $plan->video_description !!}</p>
                                <img src="{!! $plan->video_image !!}" height="150" width="150"/>
                            </a>
                        </div>
                    @endif
                </div>
                <hr>
                <h3>Sugerencia de uso</h3>
                <p>{!! $plan->how_to_use !!}</p>
                <hr>

            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-sm-offset-2">
                {!! Form::open(['method' => 'DELETE', 'action' => ['PlanController@destroy',$plan->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete',['class' => 'btn btn-danger form-control']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>

    @endif

@stop