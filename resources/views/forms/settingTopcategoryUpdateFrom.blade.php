<!DOCTYPE html>
<html>
<head>
	<title>Edit Setting Category</title>
</head>
<body>
<form  action="/admin/settingtopcategories/{{ $SettingTopcategory->id }}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf
<div class="row">

  <label for="fullname">Categoria :</label>
  <select name="category_id" class="form-control" required >
    @foreach($categories as $category)
      <option value="{{ $category->id }}" 
        @if($category->id == $SettingTopcategory->category_id)
          selected=""
        @endif
        >{{ $category->title }}</option>
    @endforeach
  </select>

  <br>

    <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Editar</button>
    </div>

</div>
</form>

</body>
</html>