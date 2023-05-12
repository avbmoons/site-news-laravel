@extends('layouts.main')

@section('title', 'Главная')

@section('content')

<div class="col-8 offset-2">
   <h3>Добро пожаловать в агрегатор новостей, {{ Auth::user()->name }} !</h3>
    <br>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores ut qui consequatur explicabo aspernatur dolorum error labore nemo ullam. Ab quisquam officiis corrupti harum reprehenderit sunt praesentium nemo voluptatum omnis.</p>
    <br>
    @if(Auth::user()->avatar)
        <img src="{{ Auth::user()->avatar }}" style="width:200px;">
    @endif
    <br>
    @if(Auth::user()->is_admin == true)
        <a href="{{ route('admin.admin')}}">В админку</a> 
    @endif
</div>


@endsection('content')