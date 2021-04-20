@extends('admin.layouts.adminLayout')

@section('title')
  Offer-Limits
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">

      <h1 class="h3 mb-3">Offer Limits <a href="{{route('offerlimits.create')}}">Crear</a></h1>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="datatables-basic" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>Title </th>
                    <th>Subtitle </th>
                    <th>Description </th>
                    <th>Url </th>
                    <th>Date End </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($offerLimits as $offerLimit)
                    <tr>
                      <td>{{ $offerLimit->title }}</td>
                      <td>{{ $offerLimit->subtitle }}</td>
                      <td>{{ $offerLimit->description }}</td>
                      <td>{{ $offerLimit->url }}</td>
                      <td>{{ $offerLimit->date_end }}</td>
                      <td>
                        <a href="{{route('offerlimits.show', $offerLimit->id)}}"><i class="align-middle mr-2 far fa-fw fa-edit"></i></a>
                        <a href="" onclick="event.preventDefault(); deleteForm('delete-{{$offerLimit->id}}')"><i class="align-middle mr-2 fas fa-fw fa-trash-alt"></i></a>
                        <form style="display: none;" action="{{ route('offerlimits.destroy', $offerLimit->id) }}" id="delete-{{$offerLimit->id}}" method="POST">
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