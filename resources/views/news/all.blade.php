@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <h1>Новости</h1>
    <div class="category-nav">
        @if ($category)
            <div class="btn-group dropright">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Категории
                </button>
                <div class="dropdown-menu">
                    @forelse($category as $item)
                        <li class="nav-item ">
                            <a href="{{ route('category', $item['category_url']) }}" class=" nav-link">
                                {{ $item['name'] }}
                            </a>
                        </li>
                    @empty
                        Новости без категорий
                    @endforelse
                </div>
            </div>
        @endif

            <form method="POST" action="  {{ route('search') }}"
                  enctype="multipart/form-data">
                @csrf
                <div class="form-group mx-sm-3 mb-2">
                    <label for="search" class="sr-only">Поиск</label>
                    <input class="form-control" name="search" id="search" placeholder="Поиск">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Поиск</button>
            </form>

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


