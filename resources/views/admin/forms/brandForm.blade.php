@extends('admin.layouts.adminLayout')

@section('title')
  Brands Edit
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($brand->name))
        <h1 class="h3 mb-3">Crear Brand</h1>
      @else
      <h1 class="h3 mb-3">Editar Brand: {{ $brand->name }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($brand->name)) {{route('brands.store')}} @else {{route('brands.update', $brand->slug)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($brand->name)) 
                  @method('PUT')
                   <input type="hidden" name="hiddenimage" class="form-control" value="{{ $brand->logo }}" required />
                @endif
                
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="title">Name <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="name" id="title" value="{{ $brand->name ?? '' }}" placeholder="Title">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="slug">SEO URL <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $brand->slug ?? '' }}" placeholder="seo-url" @if(!empty($brand->slug)) readonly @endif >
                  </div>
                </div>
                <div class="form-group">
                  <label for="logo">Logo (330x88)<span class='text-danger font-weight-medium'>*</span></label>
                  <input type="file" class="form-control" name="logo" id="logo">
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