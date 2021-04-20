@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($shippingcompany->name))
    Shipping-Company Create
  @else
    Shipping-Company Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($shippingcompany->name))
        <h1 class="h3 mb-3">Crear Shipping Company</h1>
      @else
      <h1 class="h3 mb-3">Editar Shipping Company: {{ $shippingcompany->name }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($shippingcompany->name)) {{route('shippingcompanies.store')}} @else {{route('shippingcompanies.update', $shippingcompany->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($shippingcompany->name)) 
                  @method('PUT')
                @endif
                
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name">Name <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $shippingcompany->name ?? '' }}" placeholder="Name" required="" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="description">Description <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ $shippingcompany->description ?? '' }}" placeholder="Description" required="" >
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="delivery_time">Delivery Time <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="delivery_time" id="delivery_time" value="{{ $shippingcompany->delivery_time ?? '' }}" placeholder="0 Days" required="" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="price">Price <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ $shippingcompany->price ?? '' }}" placeholder="0" required="" >
                  </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>
@endsection