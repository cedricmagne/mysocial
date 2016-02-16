<!DOCTYPE html>
<html>
<head>
    <title>
      My page
    </title>
</head>
<body>

  <h1> This is my page!</h1>
  @if($var1 == 'food')
    I love food
  @endif
  <p>{{ $var1 }}</p>
  <p>{{ $var2 }}</p>
  <p>{{ $var3 }}</p>

  <ul>
    @foreach($orders as $order)
      <li>{{ $order->name }}</li>
    @endforeach
  </ul>

</body>
</html>
