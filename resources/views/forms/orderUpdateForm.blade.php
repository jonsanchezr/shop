<!DOCTYPE html>
<html>
<head>
  <title>Edit Order</title>
</head>
<body>
<form  action="/admin/orders/{{$order->id}}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf
<div class="row">

  <label for="fullname">User :</label>
  <select name="user_id" class="form-control" required >
    @foreach($users as $user)
      <option value="{{ $user->id }}" 
        @if($user->id == $order->user_id)
          selected=""
        @endif
        >{{ $user->name }}</option>
    @endforeach
  </select>

  <br>

  <label for="fullname">Address :</label>
  <select name="address_id" class="form-control" required >
    @foreach($addresses as $address)
      <option value="{{ $address->id }}" 
        @if($address->id == $order->address_id)
          selected=""
        @endif
        >{{ $address->first_name }}</option>
    @endforeach
  </select>

  <br>

  <label for="fullname">Payment Method :</label>
  <select name="payment_method_id" class="form-control" required >
    @foreach($paymentMethods as $paymentMethod)
      <option value="{{ $paymentMethod->id }}" 
        @if($paymentMethod->id == $order->user_id)
          selected=""
        @endif
        >{{ $paymentMethod->name }}</option>
    @endforeach
  </select>

  <br>

  <label for="fullname">Statu :</label>
  <select name="statu_id" class="form-control" required >
    @foreach($status as $statu)
      <option value="{{ $statu->id }}" 
        @if($statu->id == $order->statu_id)
          selected=""
        @endif
        >{{ $statu->name }}</option>
    @endforeach
  </select>

  <br>

  <label for="fullname">Shipping Company :</label>
  <select name="shipping_company_id" class="form-control" required >
    @foreach($shippingCompanies as $shippingCompany)
      <option value="{{ $shippingCompany->id }}" 
        @if($shippingCompany->id == $order->shipping_company_id)
          selected=""
        @endif
        >{{ $shippingCompany->name }}</option>
    @endforeach
  </select>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Total :</label>
    <input type="number" name="total" class="form-control" value="{{ $order->total }}" />
  </div>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Subtotal :</label>
    <input type="number" name="subtotal" class="form-control" value="{{ $order->subtotal }}" />
  </div>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Tax :</label>
    <input type="number" name="tax" class="form-control" value="{{ $order->tax }}" />
  </div>


    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>

</div>
</form>

</body>
</html>