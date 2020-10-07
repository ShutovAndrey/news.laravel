@extends('layouts.main')

@section('title', 'Новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
    @if ($news)
        @if (!$news['private'])
            <h2>{{ $news['title'] }}</h2>
            <p>{{ $news['text'] }}</p>
        @else
            Зарегистрируйтесь для просмотра
        @endif
    @else
        Ошибка. Такой новости не существует
    @endif
@endsection


