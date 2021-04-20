<!DOCTYPE html>
<html>
<head>
	<title>Create Product</title>
</head>
<body>
<form  action="{{ route('topcategories.store') }}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf
  <div class="row">
  
  <label for="fullname">Category :</label>
  <select name="category_id" class="form-control" required >
    <option value="">Seleccione una opcion ...</option>
    @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->title }}</option>
    @endforeach
  </select>

  <br> 

    <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Crear</button>
    </div>

</div>
</form>

</body>
</html>
