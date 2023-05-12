@extends('layouts.admin')

@section('title', 'Редактировать новость')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать новость</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('admin.news.index')}}">Назад в админпанель новостей</a>
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
    <form method="POST" action="{{route('admin.news.update', ['news' => $news])}}" enctype="multipart/form-data">
      @method('put')
        @csrf
        <div class="form-group">
          <label for="category_ids">Категория</label>
          <select class="form-control @error('category_ids[]') is-invalid @enderror" name="category_ids[]" id="category_ids" multiple>
            <option value="0">-- Выбрать --</option>
            @foreach($categories as $category)
            <option @if(in_array($category->id, $news->categories->pluck('id')->toArray())) selected @endif value="{{ $category->id }}">{{ $category->title}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ $news->title }}">
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" id="author" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ $news->author}}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
             <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description">{!! $news->description !!}</textarea> 
        </div>
        <div class="form-group">
          <label for="source_id">Источник</label>
          <textarea class="form-control" name="source_id" id="source_id">{{ $news->source_id}}</textarea>
        </div>
        <div class="form-group">
          <label for="status">Статус</label>
          <select class="form-control" name="status" id="status">
            @foreach($statuses as $status)
            <option @if($news->status === $status) selected @endif>{{ $status }}</option>
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
