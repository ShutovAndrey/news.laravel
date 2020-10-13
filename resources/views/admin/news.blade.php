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
                                <a href="{{ route('admin.edit', $item) }}" type="button" class="btn btn-dark">Изменить</a>
                                <a href="{{ route('admin.destroy', $item) }}" type="button" class="btn btn-danger">Удалить</a>
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
@endsection
