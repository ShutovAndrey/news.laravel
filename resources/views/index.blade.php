@extends('layouts.main')

@section('title', 'Главная')

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="news-container">
        @if($news)
            <div class="head-container">
                <div class="head-news">
                    <a href="{{ route('news.NewsOne', $news[0]->id) }}">
                        <div class="news-item-main first-news">
                            <img class="main-img" src="{{$news[0]->image ?? asset('storage/def.jpg')}}"
                                 alt="news_image">
                            <div class="item-desc">
                                <h3 class="news-title">{{ $news[0]->title }}</h3>
                                <p class="news-text">{{ $news[0]->text }}</p>
                            </div>
                        </div>
                    </a>

                </div>
                <div class="second-news">
                    <a href="{{ route('news.NewsOne', $news[1]->id) }}">
                        <div class="news-item-second">
                            <img class="news-img" src="{{$news[1]->image ?? asset('storage/def.jpg')}}"
                                 alt="news_image">
                            <div class="item-desc">
                                <h3 class="news-title">{{ $news[1]->title }}</h3>
                                <p class="news-text">{{ $news[1]->text }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="second-news">
                    <a href="{{ route('news.NewsOne', $news[2]->id) }}">
                        <div class="news-item-second">
                            <img class="news-img" src="{{$news[2]->image ?? asset('storage/def.jpg')}}"
                                 alt="news_image">
                            <div class="item-desc">
                                <h3 class="news-title">{{ $news[2]->title }}</h3>
                                <p class="news-text">{{ $news[2]->text }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="news-title-block">
                @foreach($news as $key => $item)
                    @if($key<3)
                    @else
                        <div class="news-item">
                            <div class="item-desc-block">
                                <a href="{{ route('news.NewsOne', $item->id) }}">
                                    <h4 class="news-title">{{ $item->title }}</h4>
                                    <p class="news-text">{{ $item->text }}</p>
                                </a>
                            </div>
                        </div>
                    @endif
                @endforeach

            </div>
        @else
            <p>Пока что новостей нет...</p>
        @endif
    </div>

@endsection
