@extends('layouts.main')

@section('title', 'Профиль')

@section('menu')
    @include('menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Профиль</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('profileUpdate') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>

                                <div class="col-md-6">
                                    @if($errors->has('name'))
                                        <div class="alert-danger">
                                            @foreach($errors->get('name') as $error)
                                                <p>{{$error}}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                    <input id="name" type="text" class="form-control  @if($errors->has('name')) is-invalid @endif"
                                           name="name" value="{{ old('name') ?? $user->name}}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">e-mail</label>

                                <div class="col-md-6">
                                    @if($errors->has('email'))
                                        <div class="alert-danger">
                                            @foreach($errors->get('email') as $error)
                                                <p>{{$error}}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                    <input id="email" type="text" class="form-control @if($errors->has('email')) is-invalid @endif"
                                           name="email" value="{{ old('email') ?? $user->email}}" autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Старый пароль</label>

                                <div class="col-md-6">
                                    @if($errors->has('password'))
                                        <div class="alert-danger">
                                            @foreach($errors->get('password') as $error)
                                                <p>{{$error}}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                    <input id="password" type="password" class="form-control @if($errors->has('password')) is-invalid @endif" name="password" >

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Новый пароль</label>  <!-- запросить два раза -->

                                <div class="col-md-6" >
                                    @if($errors->has('newPassword'))
                                        <div class="alert-danger">
                                            @foreach($errors->get('newPassword') as $error)
                                                <p>{{$error}}</p>
                                            @endforeach
                                        </div>
                                    @endif
                                    <input id="password-confirm"  type="password"  class="form-control @if($errors->has('newPassword')) is-invalid @endif" name="newPassword">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Сохранить
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
