@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($adsCheckout->title))
    Ads-Checkout Create
  @else
    Ads-Checkout Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($adsCheckout->title))
        <h1 class="h3 mb-3">Crear Ads Checkout</h1>
      @else
      <h1 class="h3 mb-3">Editar Ads Checkout: {{ $adsCheckout->title }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($adsCheckout->title)) {{route('adscheckouts.store')}} @else {{route('adscheckouts.update', $adsCheckout->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($adsCheckout->title)) 
                  @method('PUT')
                   <input type="hidden" name="hiddenimage" class="form-control" value="{{ $adsCheckout->image }}" required />
                @endif
                
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="title">Title <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $adsCheckout->title ?? '' }}" placeholder="Title">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="url">URL <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="url" id="url" value="{{ $adsCheckout->url ?? '' }}" placeholder="/url" required="" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="image">image (400x420)<span class='text-danger font-weight-medium'>*</span></label>
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