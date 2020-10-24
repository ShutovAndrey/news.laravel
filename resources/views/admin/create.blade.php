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

                        <form method="POST" action=" @if(!$news->id) {{ route('admin.news.store') }}
                        @else {{ route('admin.news.update', $news) }} @endif"
                              enctype="multipart/form-data">
                            @csrf

                            @if ($news->id) @method('PUT') @endif

                            <div>
                                <label for="head_news">Заголовок новости</label>
                                @if($errors->has('title'))
                                    <div class="alert-danger">
                                        @foreach($errors->get('title') as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <input id="head_news" class="form-control
                                @if($errors->has('title')) is-invalid @endif " name="title" type="text"
                                       autofocus
                                       value="{{ old('title') ?? $news->title }}">
                            </div>

                            <div>
                                <label for="category_news">Категория новости</label>

                                @if($errors->has('category_id'))
                                    <div class="alert-danger">
                                        @foreach($errors->get('category_id') as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <select name="category_id" id="category_news" class="form-control
                                @if($errors->has('category_id')) form-control is-invalid @endif">

                                    @forelse($categories as $item)
                                        @if (old('category_id'))
                                            <option @if ($item->id == old('category_id')) selected @endif
                                            value="{{ $item->id }}"> {{ $item->name }}

                                        @else
                                            <option @if ($item->id == $news->category_id) selected @endif
                                            value="{{ $item->id }}"> {{ $item->name }}
                                            </option>
                                        @endif
                                    @empty
                                        <option value="0">Нет категорий</option>
                                    @endforelse
                                    <option value="3"> Ошибка
                                    </option>                  <!-- удалить -->
                                </select>
                            </div>

                            <div>
                                <label for="text_news">Текст новости</label>

                                @if($errors->has('text'))
                                    <div class="alert-danger">
                                        @foreach($errors->get('text') as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <textarea name="text" id="text_news" class="form-control
                                @if($errors->has('text')) form-control is-invalid @endif">
                                    {{ old('text') ?? $news->text }}
                                </textarea>
                            </div>

                            <div>
                                @if($errors->has('image'))
                                    <div class="alert-danger">
                                        @foreach($errors->get('image') as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <div class="form-group">
                                    <input type="file" name="image">
                                </div>
                            </div>

                            <div>
                                <label for="private">Приватная ?</label>

                                @if($errors->has('private'))
                                    <div class="alert-danger">
                                        @foreach($errors->get('private') as $error)
                                            <p>{{$error}}</p>
                                        @endforeach
                                    </div>
                                @endif

                                <p><input id="private" type="checkbox"
                                          @if (old('private')) checked
                                          @elseif ($news->private) checked
                                          @endif
                                          class="form-check-label"
                                          name="private" value="1">Private</p>
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

