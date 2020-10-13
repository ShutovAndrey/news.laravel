@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')

    <h1>Новости</h1>
    <div class="category-nav">
        @if ($category)
            <ul class="nav nav-tabs">
                @forelse($category as $item)
                    <li class="nav-item {{ request()->routeIs('category/'.$item['name'])?'active':'' }}"> <!--докрутить -->
                        <a href="{{ route('category', $item['category_url']) }}"
                           class=" nav-link">{{ $item['name'] }}</a>
                    </li>
                @empty
                    Новости без категорий
                @endforelse
            </ul>
        @endif

    </div>
    <br>
    <div class="news-container">

        @forelse($news as $item)
            <div class="news-item">
                <h2>{{ $item->title }}</h2>
                <div class="news-img" style="background-image: url({{$item->image ?? asset('storage/def.jpg')}})">
                </div>
                @if (!$item->private)
                    <a href="{{ route('news.NewsOne', $item->id) }}">Подробнее...</a><br>
                @endif
            </div>
            <hr>
        @empty
            <p>Нет новостей</p>

        @endforelse
    </div>
    {{ $news->links()  }}
@endsection


