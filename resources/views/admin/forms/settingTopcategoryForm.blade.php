@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($SettingTopcategory->category_id))
    Setting-Top-Categories Create
  @else
    Setting-Top-Categories Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($settingTopcategory->category_id))
        <h1 class="h3 mb-3">Crear Setting Top Categories</h1>
      @else
      <h1 class="h3 mb-3">Editar Setting Top Categories: {{ $settingTopcategory->category->title }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($settingTopcategory->category_id)) {{route('settingtopcategories.store')}} @else {{route('settingtopcategories.update', $settingTopcategory->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf
                
                @if(!empty($settingTopcategory->category_id)) 
                  @method('PUT')
                @endif

                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="category">Category <span class='text-danger font-weight-medium'>*</span></label>
                    <select type="text" class="form-control" name="category_id" id="category" placeholder="Category">
                      <option value="">Selecciona Una Opcion...</option>
                        @foreach($categories as $category)
                          @if(empty($settingTopcategory->category_id))
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                          @else
                            <option value="{{ $category->id ?? '' }}"
                            @if($category->id == $settingTopcategory->category_id)
                              selected=""
                            @endif
                            >{{ $category->title }}</option>
                          @endif      
                        @endforeach
                    </select>     
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