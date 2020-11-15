@extends('layouts.main')

@section('title', 'Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Изменение новостей</h2>
                    </div>
                    <div class="news-container">
                        @forelse($news as $item)
                            <div class="news-item">
                                <h3>{{ $item->title }}</h3>

                                <form method="post" action="{{ route('admin.news.destroy', $item) }}">
                                    <a href="{{ route('admin.news.edit', $item) }}" type="button" class="btn btn-dark">Изменить</a>
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Удалить">
                                </form>



                            </div>
                            <hr>
                        @empty
                            <p>Нет новостей</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $news->links()  }}
@endsection
