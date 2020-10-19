@extends('layouts.main')

@section('title', 'Редактор категорий')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Редактор категорий</h2>
                    </div>
                    <div class="categories-container">

                        @forelse($categories as $item)

                            <div class="news-item can-see">
                                <h3>{{ $item->name }}</h3>
                                <a href=""
                                   id="edit_category_{{$item->id}}" type="button" class="btn btn-dark">Изменить</a>
                                <a href="{{ route('admin.category.destroy', $item) }}" type="button"
                                   class="btn btn-danger">Удалить</a>
                            </div>

                            <div class="can-see">
                                <form method="POST" action="{{ route('admin.category.update', $item) }}"
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

                                            <fieldset>
                                                <input type="text" id="edit_category" class="form-control
                                @if($errors->has('name')) form-control is-invalid @endif " name="name"
                                               autofocus
                                               value="{{ old('name') ?? $item->name }}">
                                                <input type="hidden" id="edit_category" name="id" value="{{ $item->id }}">
                                                <label for="edit_category"></label>


                                                <button type="submit" class="btn btn-dark">
                                                    Готово
                                                </button>

                                            </fieldset>
                                    </div>


                                </form>

                            </div>
                            <hr>
                        @empty
                            <p>Нет категорий</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function () {
            let buttons = document.querySelectorAll('#edit_category');
            buttons.forEach((elem) => {
                elem.addEventListener('click', () => {
                    let $parts = $(this).closest('.categories-container').find('.cant-see');
                    $parts.toggleClass('can-see');
                })
            });
        }
    </script>

@endsection
