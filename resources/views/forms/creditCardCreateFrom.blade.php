<!DOCTYPE html>
<html>
<head>
	<title>Create Credit Card</title>
</head>
<body>
<form  action="{{ route('creditcards.store') }}" method="POST" id="demo-form" enctype="multipart/form-data">
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
    <label for="fullname">Card Number  :</label>
    <input type="number" name="card_number" class="form-control" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Name  :</label>
    <input type="text" name="name" class="form-control" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Expire  :</label>
    <input type="text" name="expire" class="form-control" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">CVC  :</label>
    <input type="number" name="cvc" class="form-control" required />
  </div>
         
  <br>

    <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Crear</button>
    </div>

</div>
</form>

</body>
</html>
