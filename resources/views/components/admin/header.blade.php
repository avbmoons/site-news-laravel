<nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 @if (request()->routeIs('admin')) active @endif" href="/admin">Админка</a>
    <x-menu></x-menu>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="{{ route('account.logout') }}">Выйти</a> 
       {{-- <a class="nav-link" href="#">Выйти</a>--}}
      </li>
    </ul>
</nav>