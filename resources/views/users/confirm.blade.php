@extends('layouts.app')

@section('content')

    <h3>退会確認</h3>

    <div class="row">
        <div class="col-6">
            {!! Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                {!! Form::submit('退会', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>

@endsection