@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="news-intro">
        <h1>Новости</h1>
        <div class="category-nav">
            @if ($category)
                <div class="btn-group dropright">
                    <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
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
        </div>

        <br>
    </div>

    <div class="news-container">

        @forelse($news as $item)
            <div class="news-item">
                <div class="news-item-main">
                    <img class="news-img" src="{{$item->image ?? asset('storage/def.jpg')}}" alt="news_image">
                    <div class="item-desc">
                        <h4 class="news-title">{{ $item->title }}</h4>

                    </div>
                </div>
                <div class="news-item-footer">
                    <hr>
                    @if (!$item->private)
                        <a href="{{ route('news.NewsOne', $item->id) }}">
                            <button type="submit" class="btn btn-dark">Узнать больше</button>
                        </a>
                    @endif
                    <span class="news-info">
						<i class="fa fa-eye" aria-hidden="true">  {{ $item->view_count }}  </i>
						<i class="fa fa-comments-o" aria-hidden="true">  {{ $item->comment_count }}</i>
					</span>

                </div>
            </div>
        @empty
            <p>Нет новостей</p>
    @endforelse

        {{ $news->links()  }}



@endsection


