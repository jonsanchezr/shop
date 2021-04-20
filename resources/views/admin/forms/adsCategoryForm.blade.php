@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($adsCategory->title))
    Ads-Category Create
  @else
    Ads-Category Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($adsCategory->title))
        <h1 class="h3 mb-3">Crear Ads Category</h1>
      @else
      <h1 class="h3 mb-3">Editar Ads Category: {{ $adsCategory->title }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($adsCategory->title)) {{route('adscategories.store')}} @else {{route('adscategories.update', $adsCategory->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($adsCategory->title)) 
                  @method('PUT')
                   <input type="hidden" name="hiddenimage" class="form-control" value="{{ $adsCategory->image }}" required />
                @endif
                
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="title">Title <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $adsCategory->title ?? '' }}" placeholder="Title">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="url">URL <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="url" id="url" value="{{ $adsCategory->url ?? '' }}" placeholder="/url" required="" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="image">image (498x204)<span class='text-danger font-weight-medium'>*</span></label>
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