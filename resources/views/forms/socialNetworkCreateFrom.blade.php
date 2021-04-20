<!DOCTYPE html>
<html>
<head>
	<title>Create Social Network</title>
</head>
<body>
<form  action="{{ route('socialNetworks.store') }}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf
<div class="row">


  <label for="fullname">Profile Company :</label>
  <select name="profile_company_id" class="form-control" required >
    <option value="">Seleccione una opcion ...</option>
    @foreach($profileCompanies as $profileCompany)
      <option value="{{ $profileCompany->id }}">{{ $profileCompany->name_trade }}</option>
    @endforeach
  </select>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Name  :</label>
    <input type="text" name="name" class="form-control" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Url  :</label>
    <input type="text" name="url" class="form-control" required />
  </div>
         
  <br>

    <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Crear</button>
    </div>

</div>
</form>

</body>
</html>
