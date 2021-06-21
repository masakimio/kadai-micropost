@extends('layouts.app')

@section('content')

    <h3>削除確認</h3>
    <div class="col-6">
        <div>
            {{-- 投稿内容 --}}
            <p class="mb-0">{!! nl2br(e($micropost->content)) !!}</p>
        </div>
        <div class="d-flex flex-row">
            <div>
                {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="fas fa-trash-alt"></i>', ['class' => "btn btn-danger btn-sm", 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
            <div>
                {!! Form::open(['route' => ['microposts.index', $micropost->id], 'method' => 'get']) !!}
                    {!! Form::button('cancel', ['class' => "btn btn-outline-dark btn-sm", 'type' => 'submit']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection