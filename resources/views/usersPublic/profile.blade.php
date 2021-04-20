@extends('layouts.indexLayout')
@section('content')

<!-- Page Title--> 
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{asset('assets/img/page-title/shop-pattern.jpg')}});">
      <div class="container text-left align-self-center">
        <h1 class="page-title-heading">Profile</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container mb-4"> 
      <div class="row">
        @include('includes.accountSidebar')
        <!-- Profile Settings-->
        <div class="col-lg-8 pb-5">
          <form class="row" action="{{route('users.profileStore')}}" method="POST">
            @csrf
            <input type="hidden" name="address_id" value="{{ $address->id }}">
            <input type="hidden" name="profile_id" value="{{ $profile->id }}">
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-fn">First Name</label>
                <input class="form-control" type="text" name="first_name" id="account-fn" value="{{ $profile->first_name }}" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-ln">Last Name</label>
                <input class="form-control" type="text" name="last_name" id="account-ln" value="{{ $profile->last_name }}" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-email">E-mail Address</label>
                <input class="form-control" type="email" id="account-email" value="{{ Auth::user()->email }}" disabled>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-phone">Phone Number</label>
                <input class="form-control" type="text" id="account-phone" name="phone" value="{{ $address->phone }}" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-pass">Identity</label>
                <input class="form-control" type="text" id="account-iden" name="identity" value="{{ $profile->identity }}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="account-pass">Password</label>
                <input class="form-control" type="password" id="account-pass" value="*********" disabled>
              </div>
            </div>
            <div class="col-12">
              <hr class="mt-2 mb-3">
              <div class="d-flex flex-wrap justify-content-between align-items-center">
                <div class="custom-control custom-checkbox d-block">
                  <input class="custom-control-input" type="checkbox" id="subscribe_me" checked>
                  <label class="custom-control-label" for="subscribe_me">Subscribe me to Newsletter</label>
                </div>
                <button class="btn btn-primary" type="submit" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your profile updated successfuly.">Update Profile</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

@endsection
