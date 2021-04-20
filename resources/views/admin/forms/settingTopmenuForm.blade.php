@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($settingTopmenu->title))
    Setting-Top-Menu Create
  @else
    Setting-Top-Menu Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($settingTopmenu->title))
        <h1 class="h3 mb-3">Crear Setting Top Menu</h1>
      @else
      <h1 class="h3 mb-3">Editar Setting Top Menu: {{ $settingTopmenu->title }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($settingTopmenu->title)) {{route('settingtopmenus.store')}} @else {{route('settingtopmenus.update', $settingTopmenu->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($settingTopmenu->title)) 
                  @method('PUT')
                @endif
                
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="title">Title <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $settingTopmenu->title ?? '' }}" placeholder="Title">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="url">URL <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="url" id="url" value="{{ $settingTopmenu->url ?? '' }}" placeholder="/url" required="" >
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