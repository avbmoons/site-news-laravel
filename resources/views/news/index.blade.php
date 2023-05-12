@extends('layouts.main')

@section('title', 'Все новости')

@section('content')
<div class="row mb-2">
    @forelse ($newsList as $news)
    <div class="col-md-6">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start">
            <strong class="d-inline-block mb-2 text-primary">{{$news['category_id']}}&nbsp;&nbsp;{{$news['author']}}</strong>
            <h4 class="mb-0">
              <a class="text-dark" href="#">{{$news['title']}}</a>
            </h4>
            {{-- <h3 class="mb-0">
              <a class="text-dark" href="#">{{$news['title']}}</a>
            </h3> --}}
            <div class="mb-1 text-muted">{{$news['created_at']}}</div>
            <p class="card-text mb-auto">{{$news['description']}}</p>
            <a href="{{route('newsId', ['id' => $news['id']])}}">Подробнее...</a>
          </div>         
           {{--<img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap"> --}}
           {{-- <img class="card-img-right flex-auto d-none d-md-block" data-src="{{ Storage::disk('public')->url($news->image) }}" alt="Card image cap"> --}}
           <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap" src="{{ Storage::disk('public')->url($news->image) }}">
        </div>
      </div>
    @empty
        <h2>Новостей нет</h2>
    @endforelse

    {{ $newsList->links() }}

</div>    
@endsection

