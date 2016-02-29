<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

  public function getDashboard()
  {
    return view('dashboard');
  }

  public function postSignUp(Request $request) {

    // validate
    $this->validate($request, [
      'email' => 'required|email|unique:users',
      'name' => 'required|max:120',
      'password' => 'required|min:4'
    ]);

    // get fields
    $email = $request['email'];
    $name = $request['name'];
    $password = bcrypt($request['password']);

    // creating new user
    $user = new User();
    $user->email = $email;
    $user->name = $name;
    $user->password = $password;

    // save new user intro database
    $user->save();

    // auto login user
    Auth::login($user);

    return redirect()->route('dashboard');
  }

  public function postSignIn(Request $request) {

    $this->validate($request, [
      'email' => 'required',
      'password' => 'required'
    ]);

    // try to login user
    $tmp = array('email' => $request['email'], 'password' => $request['password']);
    if(Auth::attempt($tmp)) {
      // success
      return redirect()->route('dashboard');
    }
    // fail
    return redirect()->back();
  }
}
