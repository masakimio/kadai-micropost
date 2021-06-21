@extends('layouts.app')

@section('content')

    <h3>退会確認</h3>
    <p>本当に退会しますか？</p>
    <div class="col-6">
        <div class="d-flex flex-row">
            <div>
                {!! Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                <div class="text-right">
                    {!! Form::button('退会', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <div>
                {!! Form::open(['route' => ['users.edit', $user->id], 'method' => 'get']) !!}
                    {!! Form::button('cancel', ['class' => "btn btn-outline-info", 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection