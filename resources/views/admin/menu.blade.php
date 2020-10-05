<li class="nav-item {{ request()->routeIs('home')?'active':'' }}">
    <a class="nav-link"  href="{{route('home') }}">Главная</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.add')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.add') }}">Добавить новость</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.test2')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.test2') }}">test2</a>
</li>

