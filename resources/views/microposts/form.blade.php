{!! Form::open(['route' => 'microposts.store']) !!}
    <div class="form-group ml-auto">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '2']) !!}
        {!! Form::button('Post', ['class' => 'btn btn-primary btn-lg', 'type' => 'submit']) !!}
    </div>
{!! Form::close() !!}