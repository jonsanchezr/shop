<!DOCTYPE html>
<html>
<head>
  <title>Edit Social Network</title>
</head>
<body>
<form  action="/admin/socialnetworks/{{$socialNetwork->id}}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf
<div class="row">

  <label for="fullname">Profile Company :</label>
  <select name="profile_company_id" class="form-control" required >
    @foreach($profileCompanies as $profileCompany)
      <option value="{{ $profileCompany->id }}" 
        @if($profileCompany->id == $socialNetwork->user_id)
          selected=""
        @endif
        >{{ $profileCompany->name_trade }}</option>
    @endforeach
  </select>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Name  :</label>
    <input type="text" name="name" class="form-control" value="{{ $socialNetwork->name }}" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Url  :</label>
    <input type="text" name="url" class="form-control" value="{{ $socialNetwork->url }}" required />
  </div>

  <br>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>

</div>
</form>

</body>
</html>