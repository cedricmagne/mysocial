<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('mypage', function () {
  $data = array(
    'var1' => 'food',
    'var2' => 'car',
    'var3' => 'cicle',
    'orders' => App\Order::all()
  );
  return view('mypage', $data);
});

Route::get('customer/{id}', function ($id) {
  $customer = App\Customer::find($id);
  echo $customer->name . '<br />';
  echo 'Orders: <br />';
  echo '<ul>';
  foreach ($customer->orders as $order) {
    echo '<li>';
    echo $order->name;
    echo '</li>';
  }
  echo '</ul>';
});

Route::get('customer_name', function () {
  $customer = App\Customer::where('name', '=', 'Luiz Felipe')->first();
  echo $customer->id;
});

Route::get('orders', function () {
  $orders = App\Order::all();
  foreach ($orders as $order) {
    $customer = App\Customer::find($order->customer_id);
    echo $order->name . ": Ordered by " . $order->customer->name  . '. <br />';
  }
});

Route::get('hello', function () {
  echo "Hi ";
});

Route::get('hello/{name}', function ($name) {
  echo "Hi " . $name;
});

Route::get('hello/{name}/{id}', function ($name, $id) {
  echo "Hi " . $name . " " . $id;
});

Route::post('test', function () {
  echo 'POST';
});

Route::get('test', function () {
  echo 'GET';
  echo '<form method="POST" action="test">';
  echo '<input type="submit">';
  echo '<input type="hidden" value="DELETE" name="_method"';
  echo '</form>';
});

Route::put('test', function () {
  echo 'PUT';
});

Route::delete('test', function () {
  echo 'DELETE';
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
  //
});
