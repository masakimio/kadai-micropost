@if (Auth::user()->is_favorite($micropost->id))
    {{-- unfavボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-heart-broken"></i>', ['class' => "btn btn-outline-dark btn-sm", 'type' => 'submit']) !!}
    {!! Form::close() !!}
@else
    {{-- favボタンのフォーム --}}
    {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
        {!! Form::button('<i class="fas fa-heart"></i>', ['class' => "btn btn-primary btn-sm", 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endif