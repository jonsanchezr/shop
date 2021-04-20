@extends('admin.layouts.adminLayout')

@section('title')
  Shipping Companies
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">

      <h1 class="h3 mb-3">Shipping Companies <a href="{{route('shippingcompanies.create')}}">Crear</a></h1>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="datatables-basic" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>Name </th>
                    <th>Description </th>
                    <th>Delivery Time </th>
                    <th>Price </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($shippingcompaies as $shippingcompany)
                    <tr>
                      <td>{{ $shippingcompany->name }}</td>
                      <td>{{ $shippingcompany->description }}</td>
                      <td>{{ $shippingcompany->delivery_time }}</td>
                      <td>${{formatMoney($shippingcompany->price)}}</td>
                      <td>
                        <a href="{{route('shippingcompanies.show', $shippingcompany->id)}}"><i class="align-middle mr-2 far fa-fw fa-edit"></i></a>
                        <a href="" onclick="event.preventDefault(); deleteForm('delete-{{$shippingcompany->id}}')"><i class="align-middle mr-2 fas fa-fw fa-trash-alt"></i></a>
                        <form style="display: none;" action="{{ route('shippingcompanies.destroy', $shippingcompany->id) }}" id="delete-{{$shippingcompany->id}}" method="POST">
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