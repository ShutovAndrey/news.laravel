<li  class="nav-item {{ request()->routeIs('home')?'active':'' }}">
    <a class="nav-link" href="{{ route('home') }}"> Главная</a>
</li>

<li  class="nav-item {{ request()->routeIs('news.all')?'active':'' }}">
    <a class="nav-link"  href=" {{ route('news.all') }}">Новости</a>
</li>

<li  class="nav-item {{ request()->routeIs('about')?'active':'' }}">
    <a class="nav-link" href="{{ route('about') }}"> о нас</a>
</li>

<li  class="nav-item {{ request()->routeIs('contacts')?'active':'' }}">
    <a class="nav-link"  href="{{ route('contacts') }}"> контакты</a>
</li>

<li  class="nav-item {{ request()->routeIs('admin.home')?'active':'' }}">
    <a class="nav-link"  href="{{ route('admin.home') }}"> Админка</a>
</li>

