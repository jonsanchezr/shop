<table class="table table-striped jambo_table bulk_action">
  <thead>
    <tr class="headings">
      <th class="column-title">Content </th>   
    </tr>
  </thead>
  
  <tbody>
    @foreach($comments as $comment)
    <tr class="even pointer">
      <td class=" ">{{ $comment->content }}</td>
      <td>
        <a href="/admin/comments/{{ $comment->id }}">Edit</a>
        <a href="/admin/comments/{{ $comment->id }}/delete">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <div class="modal-footer">
      <a href="/admin/comments/create">Crear Coment</a>
    </div>