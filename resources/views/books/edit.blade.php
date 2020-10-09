@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="form-group col-md-12">
      <h2>Book Edit</h2>
    </div>
    <form action="{{ route('books.update', ['id' => $book->id]) }}" method="post" class="col-md-12">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ $book->title }}" class="form-control">
      </div>
      <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{ $book->body }}</textarea>
      </div>
      <button type="submit" class="btn btn-primary col-md-12">更新</button>
    </form>
  </div>
</div>
@endsection