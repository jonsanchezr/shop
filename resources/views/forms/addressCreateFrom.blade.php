<!DOCTYPE html>
<html>
<head>
	<title>Create Address</title>
</head>
<body>
<form  action="{{ route('address.store') }}" method="POST" id="demo-form" enctype="multipart/form-data">
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

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">First Name  :</label>
    <input type="text" name="first_name" class="form-control" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Last Name  :</label>
    <input type="text" name="last_name" class="form-control" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Emal  :</label>
    <input type="email" name="email" class="form-control" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Phone  :</label>
    <input type="text" name="phone" class="form-control" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Company  :</label>
    <input type="text" name="company" class="form-control" />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Country  :</label>
    <input type="text" name="country" class="form-control" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">City  :</label>
    <input type="text" name="city" class="form-control" />
  </div>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Code Postal  :</label>
    <input type="number" name="code_postal" class="form-control" required />
  </div>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Address 1  :</label>
    <input type="text" name="address_1" class="form-control" required />
  </div>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Address 2  :</label>
    <input type="text" name="address_2" class="form-control" />
  </div>

         
  <br>

    <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Crear</button>
    </div>

</div>
</form>

</body>
</html>
