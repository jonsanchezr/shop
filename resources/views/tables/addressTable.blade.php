<table class="table table-striped jambo_table bulk_action">
  <thead>
    <tr class="headings">
      <th class="column-title">User </th>
      <th class="column-title">First Name </th>
      <th class="column-title">Last Name </th>
      <th class="column-title">Email </th>
      <th class="column-title">Phone </th>
      <th class="column-title">Company </th>
      <th class="column-title">Contry </th>
      <th class="column-title">City </th>
      <th class="column-title">Code Postal </th>
      <th class="column-title">Address 1 </th>
      <th class="column-title">Address 2 </th>
    </tr>
  </thead>

  <tbody>
    @foreach($addresses as $address)
    <tr class="even pointer">
      <td class=" ">{{ $address->user_id }}</td>
      <td class=" ">{{ $address->first_name }}</td>
      <td class=" ">{{ $address->last_name }}</td>
      <td class=" ">{{ $address->email }}</td>
      <td class=" ">{{ $address->phone }}</td>
      <td class=" ">{{ $address->company }}</td>
      <td class=" ">{{ $address->country }}</td>
      <td class=" ">{{ $address->city }}</td>
      <td class=" ">{{ $address->code_postal }}</td>
      <td class=" ">{{ $address->address_1 }}</td>
      <td class=" ">{{ $address->address_2 }}</td>
      <td>
        <a href="/addresses/{{ $address->id }}">Edit</a>
        <a href="/addresses/{{ $address->id }}/delete">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <div class="modal-footer">
      <a href="/addresses/create">Crear Address</a>
    </div>