@extends('layouts.app')

@section('content')
<div class="d-flex flex-row">
    <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
        @include('users.card')
    </aside>
    
    <div class="col-sm-7">
        <div class="mb-5">
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
        </div>
        <div class="d-flex my-box-light">
            <div class="my-box mr-auto">
                <h4>{{ $user->name }} を退会する</h4>
            </div>
            <div class="my-box">
               {{-- 退会確認画面へのフォーム --}}
            {!! Form::open(['route' => ['users.confirm', $user->id], 'method' => 'get']) !!}
                 {!! Form::button('退会する', ['class' => "btn btn-danger btn-sm", 'type' => 'submit']) !!}
             {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection