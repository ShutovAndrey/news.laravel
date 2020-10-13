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
                        @if(!$news->id)  <h2>Добавить новость</h2>
                        @else  <h2>Изменить новость</h2>
                        @endif

                        <form method="POST" action=" @if(!$news->id) {{ route('admin.add') }}
                        @else {{ route('admin.update', $news) }} @endif"
                              enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="head_news">Заголовок новости</label>
                                <input id="head_news" class="form-control" name="title" type="text" autofocus
                                       value="{{ old('title') ?? $news->title }}">
                            </div>

                            <div>
                                <label for="category_news">Категория новости</label>
                                <select name="category_id" id="category_news" class="form-control">

                                    @forelse($categories as $item)
                                        <option @if ($item->id == old('category_id'))value="{{ $item->id }}" selected
                                                @elseif($item->id == $news->category_id) value="{{ $item->id }}" selected
                                                @endif >{{ $item->name }}</option>
                                    @empty
                                        <option value="0">Нет категорий</option>
                                @endforelse

                                </select>
                            </div>

                            <div>
                                <label for="text_news">Текст новости</label>
                                <textarea name="text" id="text_news" class="form-control"> {{ old('text') ?? $news->text }} </textarea>
                            </div>

                            <div class="form-group">
                                <input type="file" name="image">
                            </div>

                            <div>
                                <label for="private">Приватная ?</label>
                                <p><input id="private" type="checkbox" @if (old('private')) checked
                                          @elseif ($news->private) checked
                                          @endif
                                    class="form-check-label" name="private" value="1">Private</p>
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

