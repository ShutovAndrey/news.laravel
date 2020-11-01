@extends('layouts.main')

@section('title', 'Добавить ресурс для парсинга')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2>Добавить ссылку для парсера</h2>

                        <form method="POST" action=" {{ route('admin.rssStore') }}"
                              enctype="multipart/form-data">
                            @csrf


                            @if($errors->has('name'))
                                <div class="alert-danger">
                                    @foreach($errors->get('name') as $error)
                                        <p>{{$error}}</p>
                                    @endforeach
                                </div>
                            @endif

                            <div>
                                <label for="head_news">Ссылка на источник</label>

                                <input id="head_news" class="form-control" name="name" type="text"
                                       autofocus>
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
@endsection

