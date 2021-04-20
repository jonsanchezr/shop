<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
</head>
<body>
<form  action="/admin/addresses/{{$address->id}}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf
<div class="row">

  <label for="fullname">User :</label>
  <select name="user_id" class="form-control" required >
    @foreach($users as $user)
      <option value="{{ $user->id }}" 
        @if($user->id == $address->user_id)
          selected=""
        @endif
        >{{ $user->name }}</option>
    @endforeach
  </select>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">First Name  :</label>
    <input type="text" name="first_name" class="form-control" value="{{ $address->first_name }}" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Last Name  :</label>
    <input type="text" name="last_name" class="form-control" value="{{ $address->last_name }}" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Email  :</label>
    <input type="email" name="email" class="form-control" value="{{ $address->email }}" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Phone  :</label>
    <input type="text" name="phone" class="form-control" value="{{ $address->phone }}" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Company  :</label>
    <input type="text" name="company" class="form-control" value="{{ $address->company }}" />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Country  :</label>
    <input type="text" name="country" class="form-control" value="{{ $address->country }}" required />
  </div>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">City :</label>
    <input type="text" name="city" class="form-control" value="{{ $address->city }}" />
  </div>

   <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Code Postal :</label>
    <input type="number" name="code_postal" class="form-control" value="{{ $address->code_postal }}" required />
  </div>

  <br>
  
  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Address 1 :</label>
    <input type="text" name="address_1" class="form-control" value="{{ $address->address_1 }}" required />
  </div>

  <br>
  
  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Address 2 :</label>
    <input type="text" name="address_2" class="form-control" value="{{ $address->address_2 }}" />
  </div>
         
  <br>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>

</div>
</form>

</body>
</html>