@extends('layouts.app')

@section ('content')
<div class="container">
    <div class="row justify-content-center">
<div class="col-md-8">

  <h1>Log In/<a href="/register">Register</a></h1>


  <form method="POST" action="/login">
  {{ csrf_field() }}


  <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control" id="email" name="email">
  </div>

  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Log In</button>
  </div>

  @include ('errors')

  </form>

  </div>


</div>


@endsection
