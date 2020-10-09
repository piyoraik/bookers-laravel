@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="form-group col-md-12">
      <h2>Book Edit</h2>
    </div>
    <form action="{{ route('users.update', ['id' => $user->id]) }}" method="post" class="col-md-12">
      @csrf
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary col-md-12">Update</button>
    </form>
  </div>
</div>
@endsection