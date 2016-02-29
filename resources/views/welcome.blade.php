@extends('layouts.master')

@section('title')
Welcome!
@endsection

@section('content')

@if(count($errors) > 0)
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <ul>
      @foreach($errors->all() as $error)
      <li>
        {{ $error }}
      </li>
      @endforeach
    </ul>
  </div>
</div>
@endif
<div class="row">
  <div class="col-md-6">
    <h3>Sign Up</h3>
    <form action="{{ route('signup') }}" method="post">
      <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
        <label for="email">Your Email</label>
        <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
      </div>
      <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
        <label for="name">Your Name</label>
        <input class="form-control" type="text" name="name" id="name" value="{{Request::old('name')}}">
      </div>
      <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </div>
  <div class="col-md-6">
    <h3>Sign In</h3>
    <form action="{{ route('signin')}}" method="post">
      <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
        <label for="email">Your Email</label>
        <input class="form-control" type="text" name="email" id="email" value="{{Request::old('email')}}">
      </div>
      <div class="form-group {{$errors->has('password') ? 'has-error' : ''}}">
        <label for="password">Your Email</label>
        <input class="form-control" type="password" name="password" id="password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <input type="hidden" name="_token" value="{{ Session::token() }}">
    </form>
  </div>
</div>
@endsection
