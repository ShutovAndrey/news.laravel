@extends('layouts.main')

@section('title', 'Главная')

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>welcome on board</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
