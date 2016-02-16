<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    //
    public function customer ($id) {
      $customer = \App\Customer::find($id);
      return view('customer', array('customer' => $customer));
    }
}
