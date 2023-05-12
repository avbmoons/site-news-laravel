<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.admin.home')) active @endif" href="{{ route('admin.admin.home') }}">
            <span data-feather="home"></span>
            Главная <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.admin.categories.*')) active @endif" href="{{ route('admin.categories.index') }}">
            <span data-feather="file"></span>
            Категории
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.admin.news.*')) active @endif" href="{{ route('admin.news.index') }}">
            <span data-feather="layers"></span>
            Новости
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.admin.newssources.*')) active @endif" href="{{ route('admin.newssources.index') }}">
            <span data-feather="layers"></span>
            Источники новостей
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.admin.users.*')) active @endif" href="{{ route('admin.users.index') }}">
            <span data-feather="users"></span>
            Пользователи
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.admin.about')) active @endif" href="{{ route('admin.admin.about') }}">
            <span data-feather="file-text"></span>
            О проекте
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.admin.mails.*')) active @endif" href="{{ route('admin.mails.index') }}">
            <span data-feather="layers"></span>
            Сообщения
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.admin.orders.*')) active @endif" href="{{ route('admin.orders.index') }}">
            <span data-feather="layers"></span>
            Заявки
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if (request()->routeIs('admin.admin.parser')) active @endif" href="{{ route('admin.parser') }}">
            <span data-feather="layers"></span>
            Парсинг
          </a>
        </li>
      </ul>
    </div>
  </nav>