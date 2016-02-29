<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

  public function postCreatePost(Request $request) {

    $this->validate($request, [
      'body_post' => 'required|max:1000'
    ]);

    $post = new Post();
    $post->body_post = $request['body_post'];
    $message = 'There was a error';
    if($request->user()->posts()->save($post)) {
      $message = 'Post succesfully created';
    }

    return redirect()->route('dashboard')->with(['message' => $message]);
  }
}
