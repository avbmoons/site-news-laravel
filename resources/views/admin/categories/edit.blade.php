@extends('layouts.admin')

@section('title', 'Редактировать категорию')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать категорию</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('admin.categories.index')}}">Назад в админпанель категорий</a>
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
    <form method="POST" action="{{route('admin.categories.update', ['category' => $category])}}">
      @method('put')
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $category->title}}">
        </div>
        <div class="form-group">
            <label for="slug">Слаг</label>
            <input type="text" id="slug" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ $category->slug}}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{!! $category->description !!}</textarea>
        </div>
        <div class="form-group">
          <label for="status">Статус</label>
          <select class="form-control" name="status" id="status">
            @foreach($statuses as $status)
            <option @if($category->status === $status) selected @endif>{{ $status }}</option>
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