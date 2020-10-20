<li class="nav-item {{ request()->routeIs('home')?'active':'' }}">
    <a class="nav-link"  href="{{route('home') }}">Главная</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.news.create')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.news.create') }}">Добавить новость</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.news.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.news.index') }}">Измененить новости</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.category.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.category.index') }}">Редактор категорий</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.users.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.users.index') }}">Пользователи</a>
</li>

