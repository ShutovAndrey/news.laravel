<li class="nav-item {{ request()->routeIs('home')?'active':'' }}">
    <a class="nav-link"  href="{{route('home') }}">Главная</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.add')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.add') }}">Добавить новость</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.index') }}">Измененить новости</a>
</li>

