@if($errors->any())
    <ul class="list-unstyled msg msg-warning msg-danger-text">
        @foreach($errors->all() as $error)
            <li><span class="glyphicon glyphicon-exclamation-sign"></span>{!! $error !!}</li>
        @endforeach
    </ul>
@endif