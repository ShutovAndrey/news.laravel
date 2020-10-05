@extends('layouts.main')

@section('title', 'Добавить новость')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Добавить новость</h2>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div>
                                <label for="head_news">Заголовок новости</label>
                                <input id="head_news" type="text" autofocus>
                            </div>

                            <div>
                                <label for="category_news">Категория новости</label>
                                <select id="category_news">
                                    <option>Спорт</option>
                                    <option>Политика</option>
                                </select>
                            </div>

                            <div>
                                <label for="text_news">Текст новости</label>
                                <textarea id="text_news"> </textarea>
                            </div>

                            <div>
                                <label for="private">Приватная ?</label>
                                <p><input id="private" type="checkbox" name="private" value="1" checked>Private</p>
                            </div>

                            <button type="submit">
                                Опубликовать
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

