тут редактируем сообщение
@extends('layouts.form')

@section('title', 'Обратная связь')

@section('content')

<div>
    <h4>Отправленное сообщение</h4>
    <hr>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
        <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="POST" action="{{route('admin.mails.update', ['mail' => $mail])}}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="username">Пользователь</label>
            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ $mail->username }}">
        </div>
        <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea class="form-control @error('comment') is-invalid @enderror" name="comment" id="comment">{!! $mail->comment !!}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
              @foreach($statuses as $status)
              <option @if($mail->status === $status) selected @endif>{{ $status }}</option>
              @endforeach
            </select>
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
        .create( document.querySelector( '#comment' ) )
        .catch( error => {
            console.error( error );
        } );
  </script>

@endpush