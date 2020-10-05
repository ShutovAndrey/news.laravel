@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')

<h1>Новости</h1>
<div>
    <h3>Выберети категорию</h3>
    <a href="{{ route('category', 'sport') }}"> Спорт</a>
    <a href="{{ route('category', 'politics') }}">Политика</a>
</div>
<br>

    @forelse($news as $item)
        <h2>{{ $item['title'] }}</h2>
        @if (!$item['private'])
            <a href="{{ route('news.NewsOne', $item['id']) }}">Подробнее...</a><br>
        @endif
        <hr>
    @empty
        <p>Нет новостей</p>
    @endforelse
@endsection


