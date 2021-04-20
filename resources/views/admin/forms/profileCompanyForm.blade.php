@extends('admin.layouts.adminLayout')

@section('title')
  @if($action == 2)
    Profile-Company Create
  @else
    Profile-Company Edit
  @endif
@endsection

@section('contentAdmin')
  <main class="content">
    <div class="container-fluid p-0">
      @if($action == 2)
        <h1 class="h3 mb-3">Crear Profile Company</h1>
      @else
      <h1 class="h3 mb-3">Editar Profile Company: {{ $profileCompany->name_trade }}</h1>
      @endif
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="@if($action == 2) {{route('profilecompany.store')}} @else {{route('profilecompany.update', $profileCompany->id)}} @endif" method="POST" id="demo-form" enctype="multipart/form-data">
                @csrf

                @if($action == 1) 
                  @method('PUT')
                    <input type="hidden" name="hiddenlogo" class="form-control" value="{{ $profileCompany->logo }}" />
                    <input type="hidden" name="hiddenfavicon" class="form-control" value="{{ $profileCompany->favicon }}" />
                @endif
                
                <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
                </ul>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="name_trade">Name Trade <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="name_trade" id="name_trade" value="{{ $action == 2 ? '' : $profileCompany->name_trade }}" placeholder="Name Trade">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="name_legal">Name Legal <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="name_legal" id="name_legal" value="{{ $action == 2 ? '' : $profileCompany->name_legal }}" placeholder="Name Legal" required="" >
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="email">Email <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ $action == 2 ? '' : $profileCompany->email }}" placeholder="example@email.com">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="phone_local">Phone Local <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="phone_local" id="phone_local" value="{{ $action == 2 ? '' : $profileCompany->phone_local }}" placeholder="(0000)-000-00-00" required="" >
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="phone_mobile">Phone Mobile </label>
                    <input type="text" class="form-control" name="phone_mobile" id="phone_mobile" value="{{ $action == 2 ? '' : $profileCompany->phone_mobile }}" placeholder="+58-000-000-00-00">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="address_1">Address 1 <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="address_1" id="address_1" value="{{ $action == 2 ? '' : $profileCompany->address_1 }}" placeholder="Address 1" required="" >
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="address_2">Address 2 </label>
                    <input type="text" class="form-control" name="address_2" id="address_2" value="{{ $action == 2 ? '' : $profileCompany->address_2 }}" placeholder="Address 2">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="city">City <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="city" id="city" value="{{ $action == 2 ? '' : $profileCompany->city }}" placeholder="City" required="" >
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="region">Region </label>
                    <input type="text" class="form-control" name="region" id="region" value="{{ $action == 2 ? '' : $profileCompany->region }}" placeholder="Region">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="country">Country <span class='text-danger font-weight-medium'>*</span></label>
                    <input type="text" class="form-control" name="country" id="country" value="{{ $action == 2 ? '' : $profileCompany->country }}" placeholder="Country" required="" >
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="logo">Logo (127x23)<span class='text-danger font-weight-medium'>*</span></label>
                  <input type="file" class="form-control" name="logo" id="logo">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="favicon">Favicon (32x32)<span class='text-danger font-weight-medium'>*</span></label>
                  <input type="file" class="form-control" name="favicon" id="favicon">
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