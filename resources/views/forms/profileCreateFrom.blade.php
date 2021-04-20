<!DOCTYPE html>
<html>
<head>
	<title>Create Profile</title>
</head>
<body>
<form  action="{{ route('profiles.store') }}" method="POST" id="demo-form" enctype="multipart/form-data">
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
    <label for="fullname">Identity  :</label>
    <input type="text" name="identity" class="form-control" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Avatar  :</label>
    <input type="file" name="avatar" class="form-control" required />
  </div>
      
  <br>

    <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Crear</button>
    </div>

</div>
</form>

</body>
</html>
