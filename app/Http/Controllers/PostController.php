<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PostController extends Controller {

  public function getDashboard()
  {
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('dashboard', ['posts' => $posts]);
  }

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

  public function getDeletePost($post_id) {
    $post = Post::where('id', $post_id)->first();

    // protection to do not allow other user deleting this posts
    if(Auth::user() != $post->user) {
      return redirect()->back();
    }

    $post->delete();
    return redirect()->route('dashboard', ['message' => 'Successfully delete!']);
  }
}
