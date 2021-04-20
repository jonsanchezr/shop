@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($label->name))
    Label Create
  @else
    Label Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($label->name))
        <h1 class="h3 mb-3">Crear Label</h1>
      @else
      <h1 class="h3 mb-3">Editar Label: {{ $label->name }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($label->name)) {{route('labels.store')}} @else {{route('labels.update', $label->slug)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($label->name)) 
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
                    <input type="text" class="form-control" name="name" id="name" value="{{ $label->name ?? '' }}" placeholder="Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="slug">SEO URL <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $label->slug ?? '' }}" placeholder="seo-url" @if(!empty($label->slug)) readonly @endif >
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