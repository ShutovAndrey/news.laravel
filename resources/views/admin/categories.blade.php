@extends('layouts.main')
@section('title', 'Редактор категорий')
@section('menu')
    @include('admin.menu')
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Редактор категорий</h2>
                    </div>
                    <div class="categories-container">
                        @forelse($categories as $item)
                            <div class="category-item">
                                <div class="news-item can-see">
                                    <h3>{{ $item->name }}</h3>
                                    <button type="button" class="btn btn-dark switch "> Изменить</button>
                                    <form action="{{ route('admin.category.destroy', $item) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                                <div class="cant-see invisible">
                                    <div>
                                        @if($errors->has('name'))
                                            <div class="alert-danger">
                                                @foreach($errors->get('name') as $error)
                                                    <p>{{$error}}</p>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <form method="POST" action="{{ route('admin.category.update', $item) }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" id="edit_category" class="form-control
                                @if($errors->has('name')) form-control is-invalid @endif " name="name"
                                               autofocus
                                               value="{{ old('name') ?? $item->name }}">
                                        <input type="hidden" id="edit_category" name="id" value="{{ $item->id }}">
                                        <label for="edit_category"></label>
                                        <button type="submit" class="btn btn-dark">
                                            Готово
                                        </button>
                                    </form>

                                </div>
                                <hr>
                            </div>
                        @empty
                            <p>Нет категорий</p>
                        @endforelse
                    </div>
                    <div class="card-body">
                        <h2>Новая категория</h2>
<div>
    <form method="POST" action="  {{ route('admin.category.store') }}"
          enctype="multipart/form-data">
        @csrf

        <div>
            @if($errors->has('name'))
                <div class="alert-danger">
                    @foreach($errors->get('name') as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <input id="head_category" class="form-control
                                @if($errors->has('name')) is-invalid @endif " name="name" type="text"
                   autofocus
                   value="{{ old('name') ?? $category->name }}">
        </div>
        <button type="submit" class="btn btn-outline-dark">
            Добавить
        </button>

    </form>
</div>

                    </div>
                </div>

            </div>



        </div>

    </div>
    <script>
        "use strict";
        const buttonItems = document.querySelectorAll('.switch');
        for (let button of buttonItems) {
            console.log(button)
            button.addEventListener('click', (evt) => {
//console.log(evt.target.parentElement.parentNode)
                evt.target.parentElement.parentNode.querySelector('.cant-see').classList.toggle('invisible');
                evt.target.parentElement.parentNode.querySelector('.can-see').classList.toggle('invisible');
            });
        }
    </script>
@endsection
