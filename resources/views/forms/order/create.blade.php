@extends('layouts.form')

@section('title', 'Заказ данных')

@section('content')

<div>
    <h4>Заказать выгрузку данных</h4>
    <hr>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>                       
        @endforeach
    @endif
<form method="POST" action="{{route('order.store')}}">
    @csrf
    <div class="form-group">
        <label for="username">Ваше имя</label>
        <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username')}}">
    </div>
    <div class="form-group">
        <label for="userphone">Ваш телефон</label>
        <input type="text" id="userphone" name="userphone" class="form-control @error('userphone') is-invalid @enderror" value="{{ old('userphone')}}">
    </div>
    <div class="form-group">
        <label for="usermail">Ваш e-mail</label>
        <input type="text" id="usermail" name="usermail" class="form-control @error('usermail') is-invalid @enderror" value="{{ old('usermail')}}">
    </div>
    <div class="form-group">
        <label for="orderinfo">Что выгрузить?</label>
        <textarea class="form-control @error('orderinfo') is-invalid @enderror" name="orderinfo" id="orderinfo">{{ old('orderinfo')}}</textarea>
    </div>
    <div class="form-group">
        <label for="status">Статус</label>
        <input type="text" id="status" name="status" class="form-control" value="{{'DRAFT'}}" readonly>
    </div>
    <br>
    <button type="submit" class="btn btn-success">Отправить</button>

</form>

</div>

@endsection('content')

