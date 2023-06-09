<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="{{ route ('news') }}">Новостной портал</a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        @if(Auth::user()->name == null)        
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('account.login') }}">Вход на сайт</a>
        @else
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('account.logout') }}">Выход</a>
        @endif
      </div>
    </div>
</header>