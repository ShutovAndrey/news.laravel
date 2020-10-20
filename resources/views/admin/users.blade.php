@extends('layouts.main')

@section('title', 'Пользователи')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h2>Пользователи</h2>
                    </div>
                    <div class="news-container">
                        @forelse($users as $item)
                            <div class="news-item">
                                <h3>{{ $item->name }}</h3>
                               @if($item->is_admin)
                                    <h5>Admin</h5>
                                   @else <h5>User</h5>
                                @endif
                                <form method="post" action="{{ route('admin.users.destroy', $item) }}">
                                    <a href="{{ route('admin.users.edit', $item) }}" type="button" class="btn btn-dark">Изменить</a>
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="btn btn-danger" value="Удалить">
                                </form>
                                <br>
                            @if($item->is_admin)
                                    <a href="{{ route('admin.toggleAdmin', $item) }}" type="button" class="btn btn-dark">Снять админа</a>
                                @else
                                    <a href="{{ route('admin.toggleAdmin', $item) }}" type="button" class="btn btn-dark">Назначить админом</a>
                                @endif

                            </div>
                            <hr>
                        @empty
                            <p>Нет пользователей</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $users->links()  }}
@endsection
