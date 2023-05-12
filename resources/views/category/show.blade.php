@extends('layouts.main')

@section('title', 'Ваша категория новостей')

@section('content')

 <div>
    {{-- <h2>Новости категории {{ $category }}</h2> --}}
    <h2>Новости категории...</h2>
 </div>
 <br>

<div class="row mb-2">

    @forelse ($news as $item)
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">{{$item['category_id']}}&nbsp;&nbsp;{{$item['author']}}</strong>
            <h3 class="mb-0">
              <a class="text-dark" href="#">{{$item['title']}}</a>
            </h3>
            <div class="mb-1 text-muted">{{$item['created_at']}}</div>
            <p class="card-text mb-auto">{{$item['description']}}</p>
            <a href="{{route('newsId', ['id' => $item['id']])}}">Подробнее...</a>
          </div>
          <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">
        </div>
      </div>    
    
    @empty
        <h2>Новостей нет</h2>
    @endforelse
</div> 
      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="{{route('category.index')}}">Назад к списку категорий</a>
      </nav>
@endsection

