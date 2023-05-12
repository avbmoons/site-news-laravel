@extends('layouts.main')

@section('title', 'Категории новостей')

@section('content')
<div class="row mb-2">
    @forelse ($categories as $category)
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">{{$category->id}}</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
            </h3>
            <div class="mb-1 text-muted">{{$category->slug}}</div>
            <a href="{{route('category.show', $category->slug)}}">Новости категории...</a>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
      </div>
    @empty
        <h2>Новостей нет</h2>
    @endforelse
</div> 

@endsection

