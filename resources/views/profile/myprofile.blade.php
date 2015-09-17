@extends('app')

@section('content')
    @if($myprofile != null)
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="well profile">
                    <div class="col-sm-12">
                        <div class="col-xs-12 col-sm-8">
                            <h2>{!! $myprofile->username !!}</h2>
                            <p><strong>E-mail: </strong>{!! $myprofile->email !!}</p>
                            <p><strong>Tipo: </strong><span class="tags">{!! $myprofile->position !!}</span></p>
                        </div>
                        <div class="col-xs-12 col-sm-4 text-center">
                            <figure>
                                <img src="{!! $myprofile->avatar !!}" alt="" class="img-circle img-responsive">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                {!! link_to('profile/' .$myprofile->id. '/edit' , 'Editar Perfil',array('class' => 'btn btn-lg btn-primary center-block')) !!}
            </div>
        </div>
    @endif

@stop