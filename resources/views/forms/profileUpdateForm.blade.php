<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
</head>
<body>
<form  action="/profiles/{{$profile->id}}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="hiddenimage" class="form-control" value="{{ $profile->avatar }}" required />

<div class="row">

  <label for="fullname">User :</label>
  <select name="user_id" class="form-control" required >
    @foreach($users as $user)
      <option value="{{ $user->id }}" 
        @if($user->id == $profile->user_id)
          selected=""
        @endif
        >{{ $user->name }}</option>
    @endforeach
  </select>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">First Name  :</label>
    <input type="text" name="first_name" class="form-control" value="{{ $profile->first_name }}" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Last Name  :</label>
    <input type="text" name="last_name" class="form-control" value="{{ $profile->last_name }}" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Identity  :</label>
    <input type="text" name="identity" class="form-control" value="{{ $profile->identity }}" required />
  </div>

  <br>

  
  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Avatar :</label>
    <input type="file" name="avatar" class="form-control" value="{{ $profile->avatar }}" />
  </div>
         
  <br>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>

</div>
</form>

</body>
</html>