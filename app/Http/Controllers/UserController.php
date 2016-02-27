<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

  public function postSignUp(Request $request) {

    // get fields
    $email = $request['email'];
    $name = $request['name'];
    $password = bcrypt($request['password']);

    $user = new User();
    $user->email = $email;
    $user->name = $name;
    $user->password = $password;

    $user->save();

    return redirect()->back();
  }

  public function postSignIn(Request $request) {

  }
}
