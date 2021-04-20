@extends('admin.layouts.adminLayout')

@section('title')
  Products
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">

      <h1 class="h3 mb-3">Products <a href="{{route('products.create')}}">Crear</a></h1>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <table id="datatables-basic" class="table table-striped" style="width:100%">
                <thead>
                  <tr>
                    <th>Title </th>
                    <th>Short-Description </th>
                    <th>Large-Description </th>
                    <th>Amount </th>
                    <th>Unit </th>
                    <th>SEO Url </th>
                    <th>Category </th>
                    <th>Brand </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                    <tr>
                      <td>{{ $product->title }}</td>
                      <td>{{ $product->short_description }}</td>
                      <td>{{ $product->large_description }}</td>
                      <td>${{formatMoney($product->amount)}}</td>
                      <td>{{ $product->unit }}</td>
                      <td>{{ $product->slug }}</td>
                      <td>{{ $product->category->title }}</td>
                      <td>{{ $product->brand->name }}</td>
                      <td>
                        <a href="{{route('products.show', $product->slug)}}"><i class="align-middle mr-2 far fa-fw fa-edit"></i></a>
                        <a href="" onclick="event.preventDefault(); deleteForm('delete-{{$product->slug}}')"><i class="align-middle mr-2 fas fa-fw fa-trash-alt"></i></a>
                        <form style="display: none;" action="{{ route('products.destroy', $product->slug) }}" id="delete-{{$product->slug}}" method="POST">
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