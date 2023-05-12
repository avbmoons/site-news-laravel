@extends('layouts.admin')

@section('title', 'Редактировать источник')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать Профиль пользователя</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('admin.users.index')}}">Назад в админпанель пользователей</a>
      </nav>
      <div class="btn-group mr-2">
      </div>
    </div>
  </div>
  <div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>                       
        @endforeach
    @endif
    <form method="POST" action="{{route('admin.users.update', ['user' => $user])}}">
      @method('put')
        @csrf
        <div class="form-group">
            <label for="is_admin">Админ</label>
            <select class="form-control" name="is_admin" id="is_admin">
              @foreach($userroles as $userrole)
              <option @if($user->is_admin == $userrole) selected @endif>{{ $userrole }}</option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name}}" readonly>
        </div>
        <div class="form-group">
            <label for="name">E-mail</label>
            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email}}" readonly>
        </div>
        <div class="form-group">
          <label for="status">Статус</label>
          <select class="form-control" name="status" id="status">
            @foreach($statuses as $status)
            <option @if($user->status === $status) selected @endif>{{ $status }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="image">Изображение</label>
          <input type="file" id="image" name="image" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>

    </form>
  </div>

@endsection('content')