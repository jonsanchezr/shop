@extends('admin.layouts.adminLayout')

@section('title')
  Social Networks
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">

      <h1 class="h3 mb-3">Social Networks <a href="{{route('socialnetworks.create')}}">Crear</a></h1>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="datatables-basic" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>Profile Company </th>
                    <th>Name </th>
                    <th>Url </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($socialNetworks as $socialNetwork)
                    <tr>
                      <td>{{ $socialNetwork->profileCompany->name_legal }}</td>
                      <td>{{ $socialNetwork->name }}</td>
                      <td>{{ $socialNetwork->url }}</td>
                      <td>
                        <a href="{{route('socialnetworks.show', $socialNetwork->id)}}"><i class="align-middle mr-2 far fa-fw fa-edit"></i></a>
                        <a href="" onclick="event.preventDefault(); deleteForm('delete-{{$socialNetwork->id}}')"><i class="align-middle mr-2 fas fa-fw fa-trash-alt"></i></a>
                        <form style="display: none;" action="{{ route('socialnetworks.destroy', $socialNetwork->id) }}" id="delete-{{$socialNetwork->id}}" method="POST">
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