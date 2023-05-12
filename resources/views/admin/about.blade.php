@extends('layouts.admin')

@section('title', 'Админка страницы О проекте')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Админ. панель страницы О проекте</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group mr-2">
        <button class="btn btn-sm btn-outline-secondary">Share</button>
        <button class="btn btn-sm btn-outline-secondary">Export</button>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <x-alert type="info" message="Это информационное сообщение"></x-alert>
    <x-alert type="danger" message="Это информационное сообщение"></x-alert>
    <x-alert type="warning" message="Это информационное сообщение"></x-alert>
    <x-alert type="success" message="Это информационное сообщение"></x-alert>
  </div>

@endsection

