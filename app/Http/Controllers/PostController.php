<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller {

  public function postCreatePost(Request $request) {
    // validation
    $post = new Post();
    $post->body_post = $request['body_post'];
    $request->user()->posts()->save($post);

    return redirect()->route('dashboard');
  }
}
