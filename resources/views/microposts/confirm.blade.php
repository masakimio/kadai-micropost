@extends('layouts.app')

@section('content')

    <h3>削除確認</h3>

    <div class="row">
        <div class="col-6">
            {!! Form::model($micropost, ['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}

                <div class="form-group">
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                
            {!! Form::close() !!}
        </div>
    </div>

@endsection