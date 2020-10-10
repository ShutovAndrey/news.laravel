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

                        <form method="POST" action="{{ route('admin.add') }}"
                              enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="head_news">Заголовок новости</label>
                                <input id="head_news" class="form-control" name="title" type="text" autofocus
                                       value="{{ old('title') }}">
                            </div>

                            <div>
                                <label for="category_news">Категория новости</label>
                                <select name="category_id" id="category_news" class="form-control">
                                    @forelse($categories as $item)
                                        <option @if ($item['id'] == old('category_id')) selected @endif value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                    @empty
                                        <option value="0">Нет категорий</option>
                                @endforelse
                                <!--<option>Спорт</option>
                                    <option>Политика</option>-->
                                </select>
                            </div>

                            <div>
                                <label for="text_news">Текст новости</label>
                                <textarea name="text" id="text_news" class="form-control"> {{ old('text') }} </textarea>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image">
                            </div>

                            <div>
                                <label for="private">Приватная ?</label>
                                <p><input id="private" type="checkbox"  @if (old('private')) checked @endif
                                    class="form-check-label" name="private" value="1" >Private</p>
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

