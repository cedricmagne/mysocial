@extends('layouts.master')

@section('title')
Your dashboard
@endsection

@section('content')
@include('includes.message_block')
  <section class="row new-post">
    <div class="col-md-6 col-md-offset-3">
      <header>
        <h3>
          What do you have to say?
        </h3>
      </header>
      <form action="{{ route('post.create') }}" method="post">
        <div class="form-group">
          <textarea class="form-control" name="body_post" id="new-post" rows="5" placeholder="Your Post"></textarea>
        </div>
        <button type="submit" class="btn btn-primary"> Create Post</button>
        <input type="hidden" value="{{ Session::token() }}" name="_token">
      </form>
    </div>
  </section>
  <section class="row posts">
    <div class="col-md-6 col-md-offset-3">
      <header>
        <h3> What other people say....</h3>
      </header>
      @foreach($posts as $post)
      <article class="post">
        <p>{{$post->body_post}}</p>
        <div class="info">
          Post by {{$post->user->name}} on {{$post->created_at}}
        </div>
        <div class="interaction">
          <a href="#">Like</a> |
          <a href="#">Dislike</a>
          @if(Auth::user() == $post->user)
          |
          <a href="#">Edit</a> |
          <a href="{{route('get.delete', ['post_id' => $post->id])}}">Delete</a>
          @endif
        </div>
      </article>
      @endforeach
    </div>
  </section>
@endsection
