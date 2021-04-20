@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($offerLimit->title))
    Offer-Limit Create
  @else
    Offer-Limit Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($offerLimit->title))
        <h1 class="h3 mb-3">Crear Offer Limit</h1>
      @else
      <h1 class="h3 mb-3">Editar Offer Limit: {{ $offerLimit->title }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($offerLimit->title)) {{route('offerlimits.store')}} @else {{route('offerlimits.update', $offerLimit->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($offerLimit->title)) 
                  @method('PUT')
                   <input type="hidden" name="hiddenimage" class="form-control" value="{{ $offerLimit->image }}" required />
                @endif
                
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="title">Title <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $offerLimit->title ?? '' }}" placeholder="Title">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="url">URL <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="url" id="url" value="{{ $offerLimit->url ?? '' }}" placeholder="/url" required="" >
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="subtitle">Subtitle <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="subtitle" id="subtitle" value="{{ $offerLimit->subtitle ?? '' }}" placeholder="Subtitle">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="description">Description <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="description" id="description" value="{{ $offerLimit->description ?? '' }}" placeholder="Description" required="" >
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="date_end">Date End <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="date_end" id="date_end" value="{{ $offerLimit->date_end ?? '' }}" placeholder="00/00/0000">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="image">image (519x477)<span class='text-danger font-weight-medium'>*</span></label>
                  <input type="file" class="form-control" name="image" id="image">
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