@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($tax->amount))
    Tax Create
  @else
    Tax Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($tax->amount))
        <h1 class="h3 mb-3">Crear Tax</h1>
      @else
      <h1 class="h3 mb-3">Editar Tax</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($tax->amount)) {{route('tax.store')}} @else {{route('tax.update', $tax->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($tax->amount)) 
                  @method('PUT')
                @endif
                
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="amount">Amount <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="number" class="form-control" name="amount" id="amount" value="{{ $tax->amount ?? '' }}" placeholder="0">
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