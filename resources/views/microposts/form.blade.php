{!! Form::open(['route' => 'microposts.store']) !!}
    <div class="form-group">
        {!! Form::textarea('content', null, ['class' => 'form-control', 'rows' => '5']) !!}
        {!! Form::button('Post', ['class' => 'btn btn-primary btn-block', 'type' => 'submit']) !!}
    </div>
{!! Form::close() !!}