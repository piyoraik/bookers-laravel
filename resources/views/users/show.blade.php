@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h3>User Info</h3>
      <table class="table">
        <tr>
          <th>ID</th>
          <td>{{$current_user->id}}</td>
        </tr>
        <tr>
          <th>Name</th>
          <td>{{$current_user->name}}</td>
        </tr>
      </table>
      <a href="{{ route('users.index') }}" class="btn btn-dark col-md-12">User List</a>
      <a href="{{ route('books.index') }}" class="btn btn-dark col-md-12 list_up">Book List</a>
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
          <th>Email</th>
          <th>Edit</th>
        </thead>
        <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td><a href="{{ route('users.edit', ['id' => $user->id]) }}">Edit</a></td>
        </tr>
      </table>
    </div>
  </div>
</div>
@endsection