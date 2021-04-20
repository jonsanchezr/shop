<!DOCTYPE html>
<html>
<head>
	<title>Edit Comment</title>
</head>
<body>
<form  action="/admin/comments/{{ $comment->id }}" method="POST" id="demo-form" enctype="multipart/form-data">
    @csrf
<div class="row">

  <div class="col-md-4 col-sm-12 col-xs-12 form-group">
    <label for="fullname">Content  :</label>
    <input type="text" name="content" class="form-control" value="{{ $comment->content }}" required />
  </div>

  <br>

    <div class="modal-footer">
      	<button type="submit" class="btn btn-primary">Editar</button>
    </div>

</div>
</form>

</body>
</html>