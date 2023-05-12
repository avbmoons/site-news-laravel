@extends('layouts.admin')

@section('title', 'Редактировать источник')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать Источник новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('admin.newssources.index')}}">Назад в админпанель источников</a>
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
    <form method="POST" action="{{route('admin.newssources.update', ['newssource' => $newssource])}}">
      @method('put')
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $newssource->title}}">
        </div>
        <div class="form-group">
            <label for="url">Адрес</label>
            <input type="text" id="url" name="url" class="form-control @error('url') is-invalid @enderror" value="{{ $newssource->url}}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{!! $newssource->description !!}</textarea>
        </div>
        <div class="form-group">
          <label for="status">Статус</label>
          <select class="form-control" name="status" id="status">
            @foreach($statuses as $status)
            <option @if($newssource->status === $status) selected @endif>{{ $status }}</option>
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

@push('js')

  <script src="{{asset('assets/js/ckeditor.js')}}"></script>
    <script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>

@endpush