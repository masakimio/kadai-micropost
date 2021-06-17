@extends('layouts.app')

@section('content')
<div class="d-flex flex-row">
    <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
        @include('users.card')
    </aside>
    
    <div class="col-sm-7">
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('name', '名前') !!}
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('introduction', '自己紹介') !!}
                {!! Form::textarea('introduction', null, ['class' => 'form-control']) !!}
            </div>
            <div class="text-right">
                {!! Form::button('変更', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
            </div>
            {!! Form::close() !!}
        {!! Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
            <div class="text-right">
                {!! Form::button('退会する', ['class' => 'btn btn-danger', 'type' => 'submit']) !!}
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection