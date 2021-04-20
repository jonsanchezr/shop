<!DOCTYPE html>
<html>
<head>
	<title>Create Order</title>
</head>
<body>
<form  action="{{ route('orders.store') }}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf
<div class="row">


  <label for="fullname">User :</label>
  <select name="user_id" class="form-control" required >
    <option value="">Seleccione una opcion ...</option>
    @foreach($users as $user)
      <option value="{{ $user->id }}">{{ $user->name }}</option>
    @endforeach
  </select>

  <br>

  <label for="fullname">Address :</label>
  <select name="address_id" class="form-control" required >
    <option value="">Seleccione una opcion ...</option>
    @foreach($addresses as $address)
      <option value="{{ $address->id }}">{{ $address->first_name }}</option>
    @endforeach
  </select>

   <br>

  <label for="fullname">Payment Method :</label>
  <select name="payment_method_id" class="form-control" required >
    <option value="">Seleccione una opcion ...</option>
    @foreach($paymentMethods as $paymentMethod)
      <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
    @endforeach
  </select>

  <br>

  <label for="fullname">Statu :</label>
  <select name="statu_id" class="form-control" required >
    <option value="">Seleccione una opcion ...</option>
    @foreach($status as $statu)
      <option value="{{ $statu->id }}">{{ $statu->name }}</option>
    @endforeach
  </select>

  <br>

  <label for="fullname">Shipping Company :</label>
  <select name="shipping_company_id" class="form-control" required >
    <option value="">Seleccione una opcion ...</option>
    @foreach($shippingCompanies as $shippingCompany)
      <option value="{{ $shippingCompany->id }}">{{ $shippingCompany->name }}</option>
    @endforeach
  </select>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Total  :</label>
    <input type="number" name="total" class="form-control" />
  </div>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Subtotal  :</label>
    <input type="number" name="subtotal" class="form-control" />
  </div>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Tax  :</label>
    <input type="number" name="tax" class="form-control" />
  </div>



    <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Crear</button>
    </div>

</div>
</form>

</body>
</html>
