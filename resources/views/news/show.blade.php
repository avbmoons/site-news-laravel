@extends('layouts.main')

@section('title', 'Ваша новость')

@section('content')

      <div class="row">
        <div class="col-md-8 blog-main">
          {{-- <h3 class="pb-3 mb-4 font-italic border-bottom">
            Category {{$news->category_id}}&nbsp;&nbsp; News item {{$news->id}}
          </h3> --}}
          <h3 class="pb-3 mb-4 font-italic border-bottom"> News item {{$news->id}}
          </h3>

          <div class="blog-post">
            {{-- <h2 class="blog-post-title">{{$news['title']}}</h2> --}}
            <h2 class="blog-post-title">{{$news->title}}</h2>
            <p class="blog-post-meta">{{$news->created_at}} by <a href="#">{{$news->author}}</a></p>

            <p>{{$news->description}}</p>
            <hr>
            {{-- <img src="{{ Storage::disk('public')->url($news->image) }}"> --}}
          </div><!-- /.blog-post -->

          <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="{{route('news')}}">Назад к списку новостей</a>
          </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            {{-- <h4 class="font-italic">About</h4>
            <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p> --}}
            <img src="{{ Storage::disk('public')->url($news->image) }}">
          </div>
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->
@endsection

      