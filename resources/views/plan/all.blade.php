@extends('app')


@section('content')
    @if($myplans != null)
        <h1 class="page-heading">Mi plan</h1>
        @foreach($myplans->chunk(10) as $Myplan)
        <div class="row">
            <div class="col-lg-12">
                @foreach($Myplan as $myplan)
                    <div class="list-group">
                            {!! link_to('plan/' .$myplan->id ,\App\Topic::find($myplan->topic)->name . " fecha: " . $myplan->created_at->format('Y-m-d') ,array('class' => 'list-group-item')) !!}
                    </div>
                @endforeach
            </div>
        </div>
        @endforeach
    @elseif(!$myplans)
        <div class="row">
            <div class="col-lg-12">
                <div class="jumbotron">
                    <h1 class="page-heading">No has agregado ninguna sugerencia a tu plan</h1>
                </div>
            </div>
        </div>
    @endif

@stop