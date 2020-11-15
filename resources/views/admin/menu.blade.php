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

<li class="nav-item {{ request()->routeIs('admin.user.index')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.user.index') }}">Пользователи</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.parser')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.parser') }}">Парсить новости</a>
</li>

<li class="nav-item {{ request()->routeIs('admin.rsslink')?'active':'' }}">
    <a class="nav-link" href="{{ route('admin.rsslink') }}">Добавить ссылку</a>
</li>

