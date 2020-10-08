@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h3>User Info</h3>
      <table class="table">
        <tr>
          <th>ID</th>
          <td>{{$user->id}}</td>
        </tr>
        <tr>
          <th>Name</th>
          <td>{{$user->name}}</td>
        </tr>
      </table>
      <h3>New Book</h3>
      <form action="{{ route('books.create') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="form-group">
          <label for="body">Body</label>
          <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary col-md-12">Submit</button>
      </form>
    </div>
    <div class="col-md-8 ">
      <table class="table">
        <thead>
          <th>ID</th>
          <th>User</th>
          <th>Title</th>
          <th>Body</th>
        </thead>
        @foreach ($books as $book)
        <tr>
          <td>{{ $book->id }}</td>
          <td>{{ $book->user->name }}</td>
          <td><a href="{{ route('books.show', ['id' => $book->id]) }}">{{ $book->title }}</a></td>
          <td>{{ $book->body }}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection