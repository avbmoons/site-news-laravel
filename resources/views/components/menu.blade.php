<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
    <a class="p-2 text-muted" href="{{ route('home') }}">Главная</a>
    <a class="p-2 text-muted" href="{{ route('category.index') }}">Категории новостей</a>
    <a class="p-2 text-muted" href="{{ route('news') }}">Все новости</a>
    @if(Auth::user()->is_admin == true)
        <a class="p-2 text-muted" href="{{ route('admin.admin') }}">Админка</a>
    @endif
    {{-- <a class="p-2 text-muted" href="{{ route('admin.admin') }}">Админка</a> --}}
    <a class="p-2 text-muted" href="{{ route('about') }}">О проекте</a>
    </nav>
</div>
<hr>

{{-- <a href="{{ route('home') }}">Главная</a>
<a href="{{ route('category.index') }}">Категории новостей</a>
<a href="{{ route('news') }}">Все новости</a>
<a href="{{ route('admin.admin') }}">Админка</a>
<a href="{{ route('about') }}">О проекте</a> --}}