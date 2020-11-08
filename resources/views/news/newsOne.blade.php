@extends('layouts.main')

@section('title', 'Новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="col-md-8">
    @if ($news)
        @if (!$news->private)
            <h2>{{ $news->title }}</h2>
            <div class="news-img" style="background-image: url({{$news->image ?? asset('storage/def.jpg')}})">
            </div>
            <p>{{ $news->text }}</p>
        @else
            Зарегистрируйтесь для просмотра
        @endif
    @else
        Ошибка. Такой новости не существует
    @endif

        @if(isset($comments))
            <hr>
        <h4>Комментарии</h4>
            @foreach($comments as $comment)
                <p> <strong>{{ $comment->name }}</strong> {{ $comment->comment }}</p>
            @endforeach
        @endif

        <hr>
    <div>
       <h4>Добавить комментарий</h4>
        <form method="POST" action="{{ route('comments.add')}}">
            @csrf
            <div class="form-group">
                <label for="name">Ваше имя</label>
                <input  id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="comment"></label>
                <textarea class="form-control" id="comment" name="comment" placeholder="Новый комментарий"></textarea>
            </div>
            <input type="hidden" name="news_id" value="{{ $news->id }}">
            <button type="submit" class="btn btn-primary">
                Отправить
            </button>
        </form>
    </div>
    </div>
@endsection


