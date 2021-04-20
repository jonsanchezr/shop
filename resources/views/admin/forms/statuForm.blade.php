@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($statu->name))
    Statu Create
  @else
    Statu Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($statu->name))
        <h1 class="h3 mb-3">Crear Statu</h1>
      @else
      <h1 class="h3 mb-3">Editar Statu: {{ $statu->name }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($statu->name)) {{route('status.store')}} @else {{route('status.update', $statu->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($statu->name)) 
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
                    <input type="text" class="form-control" name="name" id="name" value="{{ $statu->name ?? '' }}" placeholder="Name">
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