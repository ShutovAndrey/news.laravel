<li class="nav-item {{ request()->routeIs('home')?'active':'' }}">
    <a class="nav-link" href="{{ route('home') }}"> Главная</a>
</li>

<li class="nav-item {{ request()->routeIs('news.all')?'active':'' }}">
    <a class="nav-link" href=" {{ route('news.all') }}">Новости</a>
</li>

@if(Auth::user())
    @if(Auth::user()->is_admin)
        <li class="nav-item {{ request()->routeIs('admin.home')?'active':'' }}">
            <a class="nav-link" href="{{ route('admin.home') }}"> Админка</a>
        </li>
    @endif
@endif




