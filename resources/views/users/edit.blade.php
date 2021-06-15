@extends('layouts.app')

@section('content')
<div class="row">
    <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
        @include('users.card')
    </aside>
    
    <div class="col-sm-6">
        <h3>アカウント名変更</h3>
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::text('name', null, ['class' => 'form-control']) !!}
            </div>

                {!! Form::submit('変更', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
            
        <h3>退会</h3>
    {{-- メッセージ削除フォーム --}}
        {!! Form::model($user, ['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
            {!! Form::submit('退会', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
</div>
@endsection