@extends('layouts.main')

@section('contacts', 'Контакты')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Для связи со мной:</h2>
                        <p>https://tg-me.ru/andrey_vs_you</p>
                        <p>shutovandrey@yandex.ru</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


