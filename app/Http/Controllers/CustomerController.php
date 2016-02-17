<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('isAdmin');
  }

  public function customer ($id) {
    $customer = \App\Customer::find($id);
    return view('customer', array('customer' => $customer));
  }
}
