<!DOCTYPE html>
<html>
<head>
  <title>Edit Credit Card</title>
</head>
<body>
<form  action="/admin/creditcards/{{$creditcard->id}}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf
<div class="row">

  <label for="fullname">User :</label>
  <select name="user_id" class="form-control" required >
    @foreach($users as $user)
      <option value="{{ $user->id }}" 
        @if($user->id == $creditcard->user_id)
          selected=""
        @endif
        >{{ $user->name }}</option>
    @endforeach
  </select>

  <br>

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Card Number  :</label>
    <input type="number" name="card_number" class="form-control" value="{{ $creditcard->card_number }}" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Name  :</label>
    <input type="text" name="name" class="form-control" value="{{ $creditcard->name }}" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Expire  :</label>
    <input type="text" name="expire" class="form-control" value="{{ $creditcard->expire }}" required />
  </div>

  <br>

  <div class="col-md-8 col-sm-12 col-xs-12 form-group">
    <label for="fullname">CVC  :</label>
    <input type="number" name="cvc" class="form-control" value="{{ $creditcard->cvc }}" required />
  </div>
         
  <br>

    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Editar</button>
    </div>

</div>
</form>

</body>
</html>