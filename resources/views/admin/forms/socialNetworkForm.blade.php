@extends('admin.layouts.adminLayout')

@section('title')
  @if(empty($socialNetwork->name))
    Social-Network Create
  @else
    Social-Network Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if(empty($socialNetwork->name))
        <h1 class="h3 mb-3">Crear Social-Network</h1>
      @else
      <h1 class="h3 mb-3">Editar Social-Network: {{ $socialNetwork->name }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if(empty($socialNetwork->name)) {{route('socialnetworks.store')}} @else {{route('socialnetworks.update', $socialNetwork->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if(!empty($socialNetwork->name)) 
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
                    <input type="text" class="form-control" name="name" id="name" value="{{ $socialNetwork->name ?? '' }}" placeholder="Name" required="" >
                  </div>
                  <div class="form-group col-md-6">
                    <label for="url">Url <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="url" id="url" value="{{ $socialNetwork->url ?? '' }}" placeholder="/url" required="" >
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="profile_company">Profile Company <span class='text-danger font-weight-medium'>*</span></label>
                    <select type="text" class="form-control" name="profile_company_id" id="profile_company" placeholder="Profile Company">
                      @foreach($profileCompanies as $profileCompany)
                        @if(empty($socialNetwork->name))
                          <option value="{{ $profileCompany->id }}">{{ $profileCompany->name_legal }}</option>
                        @else
                          <option value="{{ $profileCompany->id ?? '' }}"
                          @if($profileCompany->id == $socialNetwork->profile_company_id)
                            selected=""
                          @endif
                          >{{ $profileCompany->name_legal }}</option>
                        @endif      
                      @endforeach
                    </select>     
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