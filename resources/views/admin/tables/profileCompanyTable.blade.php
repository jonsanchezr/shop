@extends('admin.layouts.adminLayout')

@section('title')
  Profile Companies
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">

      <h1 class="h3 mb-3">Profile Companies <a href="{{route('profilecompany.create')}}">Crear</a></h1>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="datatables-basic" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>Name Trade </th>
                    <th>Name Legal </th>
                    <th>Email </th>
                    <th>Phone Local </th>
                    <th>Address 1 </th>
                    <th>City </th>
                    <th>Country </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($profileCompanies as $profileCompany)
                    <tr>
                      <td>{{ $profileCompany->name_trade }}</td>
                      <td>{{ $profileCompany->name_legal }}</td>
                      <td>{{ $profileCompany->email }}</td>
                      <td>{{ $profileCompany->phone_local }}</td>
                      <td>{{ $profileCompany->address_1 }}</td>
                      <td>{{ $profileCompany->city }}</td>
                      <td>{{ $profileCompany->country }}</td>
                      <td>
                        <a href="{{route('profilecompany.show', $profileCompany->id)}}"><i class="align-middle mr-2 far fa-fw fa-edit"></i></a>
                        <a href="" onclick="event.preventDefault(); deleteForm('delete-{{$profileCompany->id}}')"><i class="align-middle mr-2 fas fa-fw fa-trash-alt"></i></a>
                        <form style="display: none;" action="{{ route('profilecompany.destroy', $profileCompany->id) }}" id="delete-{{$profileCompany->id}}" method="POST">
                          @csrf
                          @method('DELETE')
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
@endsection

@section('js')
  <script>
    $(function() {
      // Datatables basic
      $("#datatables-basic").DataTable({
        responsive: true
      });
    });
  </script>
  <script>
    function deleteForm(name) {
      let form = document.getElementById(name);
      form.submit();
    }
  </script>
@endsection