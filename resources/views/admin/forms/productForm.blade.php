@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($product->title))
    Product Create
  @else
    Product Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($product->title))
        <h1 class="h3 mb-3">Crear Product</h1>
      @else
      <h1 class="h3 mb-3">Editar Product: {{ $product->title }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($product->title)) {{route('products.store')}} @else {{route('products.update', $product->slug)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf
                
                @if(!empty($product->title)) 
                  @method('PUT')
                  <input type="hidden" name="hiddenimage1" value="{{ $product->slot_image_1 }}"/>
                  <input type="hidden" name="hiddenimage2" value="{{ $product->slot_image_2 }}" />
                  <input type="hidden" name="hiddenimage3" value="{{ $product->slot_image_3 }}" />
                  <input type="hidden" name="hiddenimage4" value="{{ $product->slot_image_4 }}" />
                  <input type="hidden" name="hiddenvideo" value="{{ $product->slot_video }}" />
                @endif

                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="category">Category <span class='text-danger font-weight-medium'>*</span></label>
                    <select type="text" class="form-control" name="category_id" id="category" placeholder="Category">
                      <option value="">Selecciona Una Opcion...</option>
                        @foreach($categories as $category)
                          @if(empty($product->title))
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                          @else
                            <option value="{{ $category->id ?? '' }}"
                            @if($category->id == $product->category_id)
                              selected=""
                            @endif
                            >{{ $category->title }}</option>
                          @endif      
                        @endforeach
                    </select>     
                  </div>
                  <div class="form-group col-md-6">
                    <label for="brand">Brand <span class='text-danger font-weight-medium'>*</span></label>
                    <select type="text" class="form-control" name="brand_id" id="brand" placeholder="Brand">
                      <option value="">Selecciona Una Opcion...</option>
                      @foreach($brands as $brand)
                        @if(empty($product->title))
                          <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @else
                          <option value="{{ $brand->id ?? '' }}"
                            @if($brand->id == $product->brand_id)
                              selected=""
                            @endif
                            >{{ $brand->name }}</option>
                        @endif      
                      @endforeach
                    </select>     
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="title">Title <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $product->title ?? '' }}" placeholder="Title">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="slug">SEO Url <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $product->slug ?? '' }}" placeholder="/url" @if(!empty($product->title)) readonly @endif>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="short_description">Short-Description <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="short_description" id="short_description" value="{{ $product->short_description ?? '' }}" placeholder="Short Description">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="large_description">Large-Description <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="large_description" id="large_description" value="{{ $product->large_description ?? '' }}" placeholder="Large Description">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="amount">Amount <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="number" class="form-control" name="amount" id="amount" value="{{ $product->amount ?? '' }}" placeholder="00,00">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="unit">Unit <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="number" class="form-control" name="unit" id="unit" value="{{ $product->unit ?? '' }}" placeholder="0">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="slot_image_1">Image1 (260x176)<span class='text-danger font-weight-medium'>*</span></label>
                    <input type="file" class="form-control" name="slot_image_1" id="slot_image_1">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="slot_image_2">Image2 (260x176)</label>
                    <input type="file" class="form-control" name="slot_image_2" id="slot_image_2">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="slot_image_3">Image3 (260x176)</label>
                    <input type="file" class="form-control" name="slot_image_3" id="slot_image_3">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="slot_image_4">Image4 (260x176)</label>
                    <input type="file" class="form-control" name="slot_image_4" id="slot_image_4">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="slot_video">Video </label>
                    <input type="file" class="form-control" name="slot_video" id="slot_video">
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