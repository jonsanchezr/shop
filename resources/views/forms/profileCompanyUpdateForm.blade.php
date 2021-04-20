<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile Company</title>
</head>
<body>
  <form  action="/admin/profilecompany/{{$profileCompany->id}}" method="POST" id="demo-form" enctype="multipart/form-data">
      @csrf

    <input type="hidden" name="hiddenlogo" class="form-control" value="{{ $profileCompany->logo }}" />
    <input type="hidden" name="hiddenfavicon" class="form-control" value="{{ $profileCompany->favicon }}" />

    <div class="row">

      <div class="col-md-4 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Name Trade  :</label>
        <input type="text" name="name_trade" class="form-control" value="{{ $profileCompany->name_trade }}" required />
      </div>

      <br>

      <div class="col-md-8 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Name Legal  :</label>
        <input type="text" name="name_legal" class="form-control" value="{{ $profileCompany->name_legal }}" required />
      </div>

      <br>

      <div class="col-md-8 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Emal  :</label>
        <input type="email" name="email" class="form-control" value="{{ $profileCompany->email }}" required />
      </div>

      <br>

      <div class="col-md-8 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Phone Local  :</label>
        <input type="text" name="phone_local" class="form-control" value="{{ $profileCompany->phone_local }}" required />
      </div>

      <br>

      <div class="col-md-8 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Phone Mobile  :</label>
        <input type="text" name="phone_mobile" class="form-control" value="{{ $profileCompany->phone_mobile }}" />
      </div>

      <br>

      <div class="col-md-4 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Address 1  :</label>
        <input type="text" name="address_1" class="form-control" value="{{ $profileCompany->address_1 }}" required />
      </div>

      <br>

      <div class="col-md-4 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Address 2  :</label>
        <input type="text" name="address_2" class="form-control" value="{{ $profileCompany->address_2 }}" />
      </div>

      <br>

      <div class="col-md-8 col-sm-12 col-xs-12 form-group">
        <label for="fullname">City  :</label>
        <input type="text" name="city" class="form-control" value="{{ $profileCompany->city }}" required/>
      </div>

      <br>

      <div class="col-md-8 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Region  :</label>
        <input type="text" name="region" class="form-control" value="{{ $profileCompany->region }}" />
      </div>

      <br>

      <div class="col-md-8 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Country  :</label>
        <input type="text" name="country" class="form-control" value="{{ $profileCompany->country }}" required />
      </div>

      <br>

      <div class="col-md-4 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Logo  :</label>
        <input type="file" name="logo" class="form-control" value="{{ $profileCompany->logo }}" required />
      </div>

      <br>

      <div class="col-md-4 col-sm-12 col-xs-12 form-group">
        <label for="fullname">Favicon  :</label>
        <input type="file" name="favicon" class="form-control" value="{{ $profileCompany->favicon }}" required />
      </div>

      <br>

      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Editar</button>
      </div>

    </div>
  </form>

</body>
</html>
