@extends('layouts.main')

@section('title', 'Добавить новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Добавить новость</h2>

                        <form method="POST" action="{{ route('admin.add') }}">
                            @csrf

                            <div>
                                <label for="head_news">Заголовок новости</label>
                                <input id="head_news" class="form-control" name="title" type="text" autofocus>
                            </div>

                            <div>
                                <label for="category_news">Категория новости</label>
                                <select name="category_id" id="category_news" class="form-control">
                                    <option>Спорт</option>
                                    <option>Политика</option>
                                </select>
                            </div>

                            <div>
                                <label for="text_news">Текст новости</label>
                                <textarea name="text" id="text_news" class="form-control"> </textarea>
                            </div>

                            <div>
                                <label for="private">Приватная ?</label>
                                <p><input id="private" type="checkbox" class="form-check-label" name="private" value="1" checked>Private</p>
                            </div>

                            <button type="submit" class="btn btn-outline-dark">
                                Опубликовать
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

