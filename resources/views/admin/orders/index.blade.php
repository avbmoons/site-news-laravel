@extends('layouts.admin')

@section('title', 'Админка заявок')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Админ. панель Заявок на выгрузку</h1>
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
          <th>Пользователь</th>
          <th>Телефон</th>
          <th>Почта</th>
          <th>Заявка</th>
          <th>Дата добавления</th>
          <th>Дата изменения</th>
          <th>Статус</th>
          <th>Действия</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($ordersList as $order)
        <tr>
          <td>{{ $order->id }}</td>
          <td>{{ $order->username }}</td>
          <td>{{ $order->userphone }}</td>
          <td>{{ $order->usermail }}</td>
          <td>{{ $order->orderinfo }}</td>
          <td>{{ $order->created_at }}</td>
          <td>{{ $order->updated_at }}</td>
          <td>{{ $order->status }}</td>
          <td><a href="{{route('admin.orders.show', $order->id)}}">См.</a> &nbsp; <a href="{{route('admin.orders.edit', $order->id)}}">Изм.</a> &nbsp; <a href="javascript:;" class="delete" rel="{{ $order->id }}" style=" color: red;">Уд.</a></td>
        </tr>            
        @empty
        <tr>
          <td colspan="7">Записей нет</td>
        </tr>            
        @endforelse
      </tbody>

    </table>

    {{ $ordersList->links() }}

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

