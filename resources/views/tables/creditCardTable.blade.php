<table class="table table-striped jambo_table bulk_action">
  <thead>
    <tr class="headings">
      <th class="column-title">User </th>
      <th class="column-title">Card Number </th>
      <th class="column-title">Name </th>
      <th class="column-title">Expire </th>
      <th class="column-title">CVC </th>
    </tr>
  </thead>

  <tbody>
    @foreach($creditcards as $creditcard)
    <tr class="even pointer">
      <td class=" ">{{ $creditcard->user_id }}</td>
      <td class=" ">{{ $creditcard->card_number }}</td>
      <td class=" ">{{ $creditcard->name }}</td>
      <td class=" ">{{ $creditcard->expire }}</td>
      <td class=" ">{{ $creditcard->cvc }}</td>
      <td>
        <a href="/admin/{{ $creditcard->id }}">Edit</a>
        <a href="/admin/{{ $creditcard->id }}/delete">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <div class="modal-footer">
      <a href="/admin/create">Crear Credit Card</a>
    </div>