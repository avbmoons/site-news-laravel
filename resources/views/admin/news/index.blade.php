@extends('layouts.admin')

@section('title', 'Админка Новостей')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Админ. панель Новостей</h1>
    <div class="col-4 d-flex justify-content-end align-items-center">
      <a class="btn btn-sm btn-outline-secondary" href="{{route('admin.news.create')}}">Добавить новость</a>
    </div>

    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button class="btn btn-sm btn-outline-secondary">Share</button>
        <button class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#ID</th>
          <th>Категория</th>
          <th>Заголовок</th>
          <th>Автор</th>
          <th>Описание</th>
          <th>Дата добавления</th>
          <th>Дата изменения</th>
          <th>Статус</th>
          <th>Источник</th>
          <th>Действия</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($newsList as $news)
        <tr>
          <td>{{ $news->id }}</td>
          <td>{{ $news->categories->map(fn($item) => $item->title)->implode(", ") }}</td>
          <td>{{ $news->title }}</td>
          <td>{{ $news->author }}</td>
          <td>{{ $news->description }}</td>
          <td>{{ $news->created_at }}</td>
          <td>{{ $news->updated_at }}</td>
          <td>{{ $news->status }}</td>
          <td>{{ $news->source_id }}</td>          
          <td><a href="{{route('admin.news.edit', ['news' => $news])}}">Изм.<a href="javascript:;" class="delete" rel="{{ $news->id }}" style="color: red;"> Уд.</a></td>
        </tr>            
        @empty
        <tr>
          <td colspan="7">Записей нет</td>
        </tr>            
        @endforelse
      </tbody>

    </table>

    {{ $newsList->links() }}

  </div>

@endsection

@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function(e, k) {
                e.addEventListener("click", function() {
                const id = this.getAttribute('rel');
                if(confirm(`Подтверждаете удаление записи с #ID = ${id}`)) {
                    send(`/admin/news/${id}`).then(() => {
                        location.reload();
                    });
                } else {
                    alert("Удаление отменено");
                }
            });
            });
        });

        async function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
