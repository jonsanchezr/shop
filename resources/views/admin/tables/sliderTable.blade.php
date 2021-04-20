@extends('admin.layouts.adminLayout')

@section('title')
  Sliders
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">

      <h1 class="h3 mb-3">Sliders <a href="{{route('sliders.create')}}">Crear</a></h1>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="datatables-basic" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>Brand</th>
                    <th>Title</th>
                    <th>Amount</th>
                    <th>Url</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($sliders as $slider)
                    <tr>
                      <td>{{ $slider->brand->name }}</td>
                      <td>{{ $slider->title }}</td>
                      <td>${{formatMoney($slider->amount)}}</td>
                      <td>{{ $slider->url }}</td>
                      <td>
                        <a href="{{route('sliders.show', $slider->id)}}"><i class="align-middle mr-2 far fa-fw fa-edit"></i></a>
                        <a href="" onclick="event.preventDefault(); deleteForm('delete-{{$slider->id}}')"><i class="align-middle mr-2 fas fa-fw fa-trash-alt"></i></a>
                        <form style="display: none;" action="{{ route('sliders.destroy', $slider->id) }}" id="delete-{{$slider->id}}" method="POST">
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