<!DOCTYPE html>
<html>
<head>
	<title>Create Tax</title>
</head>
<body>
<form  action="{{ route('tax.store') }}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf
<div class="row">

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Amount  :</label>
    <input type="numeric" name="amount" class="form-control" required />
  </div>

  <br>

    <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Crear</button>
    </div>

</div>
</form>

</body>
</html>
