@extends('admin.layouts.adminLayout')

@section('title')
  Categories Edit
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($category->title))
        <h1 class="h3 mb-3">Crear Categoria</h1>
      @else
      <h1 class="h3 mb-3">Editar Categoria: {{ $category->title }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($category->title)) {{route('categories.store')}} @else {{route('categories.update', $category->slug)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($category->title)) 
                  @method('PUT')
                  <input type="hidden" name="hiddenimage" class="form-control" value="{{ $category->image }}"/>
                @endif
                

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="title">Title <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $category->title ?? '' }}" placeholder="Title" required="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="slug">SEO URL <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug ?? '' }}" placeholder="seo-url" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="description">Description <span class='text-danger font-weight-medium'>*</span></label>
                  <input type="text" class="form-control" name="description" id="description" value="{{ $category->description ?? '' }}" placeholder="Description" required="">
                </div>
                <div class="form-group">
                  <label for="image">Image <span class='text-danger font-weight-medium'>*</span></label>
                  <input type="file" class="form-control" name="image" id="image" value="{{ $category->image ?? '' }}">
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