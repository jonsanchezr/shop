@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($slider->title))
    Sliders Create
  @else
    Sliders Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($slider->title))
        <h1 class="h3 mb-3">Crear Slider</h1>
      @else
      <h1 class="h3 mb-3">Editar Slider: {{ $slider->title }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($slider->title)) {{route('sliders.store')}} @else {{route('sliders.update', $slider->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($slider->title)) 
                  @method('PUT')
                   <input type="hidden" name="hiddenimage" class="form-control" value="{{ $slider->image }}" required />
                @endif
                
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="brand">Brand <span class='text-danger font-weight-medium'>*</span></label>
                    <select type="text" class="form-control" name="brand_id" id="brand" placeholder="Brand">
                      <option value="">Selecciona Una Opcion...</option>
                      @foreach($brands as $brand)
                        @if(empty($slider->title))
                          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @else
                          <option value="{{ $brand->id ?? '' }}"
                            @if($brand->id == $slider->brand_id)
                              selected=""
                            @endif
                            >{{ $brand->name }}</option>
                        @endif      
                      @endforeach
                    </select>     
                  </div>
                  <div class="form-group col-md-6">
                    <label for="title">Title <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $slider->title ?? '' }}" placeholder="Titulo">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="amount">Amount <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="number" class="form-control" name="amount" id="amount" value="{{ $slider->amount ?? '' }}" placeholder="00.00">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="url">Url <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="url" id="url" value="{{ $slider->url ?? '' }}" placeholder="/url">
                  </div>
                </div>
                <div class="form-group">
                  <label for="image">Image (675x432)<span class='text-danger font-weight-medium'>*</span></label>
                  <input type="file" class="form-control" name="image" id="image">
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