@extends('layouts.admin')

@section('title', 'Админка Пользователей')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Админ. панель пользователей</h1>
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
          <th>Админ</th>
          <th>Имя</th>
          <th>E-mail</th>
          <th>Дата добавления</th>
          <th>Дата изменения</th>
          <th>Статус</th>          
          <th>Действия</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($usersList as $user)
        <tr>
          <td>{{ $user->id }}</td>
            @if($user->is_admin == true)
          <td>Admin</td>
          @else
          <td>No</td>
          @endif
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->created_at }}</td>
          <td>{{ $user->updated_at }}</td>
          <td>{{ $user->status }}</td>
          <td><a href="{{route('admin.users.edit', $user->id)}}">Изм.</a> &nbsp; <a href="javascript:;" class="delete" rel="{{ $user->id }}" style=" color: red;">Уд.</a></td>
        </tr>            
        @empty
        <tr>
          <td colspan="7">Записей нет</td>
        </tr>            
        @endforelse
      </tbody>

    </table>

    {{ $usersList->links() }}

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

