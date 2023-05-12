@extends('layouts.main')

@section('title', 'О проекте')

@section('content')

<div>
    <h2>О проекте</h2>
    <h3>Контакты:</h3>
    <br>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias repellendus facere nulla illo sit alias quod voluptatibus, laborum mollitia ab, dolores praesentium eligendi cumque libero minima! Esse ratione suscipit cumque.</p>
</div>
<div>
    <hr>
    <div class="row flex-nowrap justify-content-between align-items-center">   

    <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="{{route('mail.create')}}">Отправить сообщение</a>
    </div>
    <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="btn btn-sm btn-outline-secondary" href="{{route('order.create')}}">Заказать выгрузку данных</a>
    </div>
    </div>
    <br>
</div>

@endsection

