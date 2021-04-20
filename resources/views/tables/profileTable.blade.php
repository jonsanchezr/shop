<table class="table table-striped jambo_table bulk_action">
  <thead>
    <tr class="headings">
      <th class="column-title">User </th>
      <th class="column-title">First Name </th>
      <th class="column-title">Last Name </th>
      <th class="column-title">Identity </th>
      <th class="column-title">Avatar </th>
    </tr>
  </thead>

  <tbody>
    @foreach($profiles as $profile)
    <tr class="even pointer">
      <td class=" ">{{ $profile->user->name }}</td>
      <td class=" ">{{ $profile->first_name }}</td>
      <td class=" ">{{ $profile->last_name }}</td>
      <td class=" ">{{ $profile->identity }}</td>
      <td class=" "><img src="{{ asset('assets/img/profiles/'.$profile->avatar) }}"></td>
      <td>
        <a href="/profiles/{{ $profile->id }}">Edit</a>
        <a href="/profiles/{{ $profile->id }}/delete">Delete</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
    <div class="modal-footer">
      <a href="/profiles/create">Crear Profile</a>
    </div>