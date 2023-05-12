@extends('layouts.admin')

@section('title', 'Парсинг новостей')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
  <h1 class="h2">Парсинг новостей</h1>
</div>>
<x-alert type="success" message="Парсинг выполнен успешно"></x-alert>

<div class="btn-toolbar mb-2 mb-md-0">
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('admin.news.index')}}">Назад в админпанель новостей</a>
      </nav>
</div>
"Parsing completed"

@endsection

