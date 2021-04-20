@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($paymentMethod->name))
    Payment-Method Create
  @else
    Payment-Method Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($paymentMethod->name))
        <h1 class="h3 mb-3">Crear Payment Method</h1>
      @else
      <h1 class="h3 mb-3">Editar Payment Method: {{ $paymentMethod->name }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($paymentMethod->name)) {{route('paymentmethods.store')}} @else {{route('paymentmethods.update', $paymentMethod->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($paymentMethod->name)) 
                  @method('PUT')
                @endif
                
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="name">Name <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $paymentMethod->name ?? '' }}" placeholder="Name">
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