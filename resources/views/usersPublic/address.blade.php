@extends('layouts.indexLayout')
@section('content')

<!-- Page Title-->
<div class="page-title d-flex" aria-label="Page title" style="background-image: url({{asset('assets/img/page-title/shop-pattern.jpg')}});">
  <div class="container text-left align-self-center">
    <h1 class="page-title-heading">Profile Address</h1>
  </div>
</div>
<!-- Page Content-->
<div class="container mb-4">
  <div class="row">
    @include('includes.accountSidebar')
    <!-- Addresses-->
    <div class="col-lg-8 pb-5">
      <h5>Contact Address</h5>
      <hr class="pb-3">
      <form class="row" action="{{route('users.addressStore')}}" method="POST">
        @csrf
        <input type="hidden" name="address_id" value="{{ $address->id }}">

        <div class="col-md-6">
          <div class="form-group">
            <label for="account-company">Company</label>
            <input class="form-control" type="text" name="company" id="account-company" value="{{ $address->company }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-country">Country</label>
            <select class="form-control" name="country" id="account-country" value="{{ $address->country }}">
              <option>{{ $address->country }}</option>
              <option>Australia</option>
              <option>Canada</option>
              <option>France</option>
              <option>Germany</option>
              <option>Switzerland</option>
              <option>United States</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-city">City</label>
              <input type="text" class="form-control" name="city" id="account-city" value="{{ $address->city }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-zip">ZIP Code</label>
            <input class="form-control" type="text" name="code_postal" id="account-zip" value="{{ $address->code_postal }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-address1">Address 1</label>
            <input class="form-control" type="text" name="address_1" id="account-address1" value="{{ $address->address_1 }}">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="account-address2">Address 2</label>
            <input class="form-control" type="text" name="address_2" id="account-address2" value="{{ $address->address_2 }}">
          </div>
        </div>
        <div class="col-12 padding-top-1x">
          <h5>Shipping Address</h5>
          <hr class="pb-3">
          <div class="custom-control custom-checkbox d-block">
            <input class="custom-control-input" type="checkbox" id="same_address" checked>
            <label class="custom-control-label" for="same_address">Same as Contact Address</label>
          </div>
          <hr class="my-3">
          <div class="text-right">
            <button class="btn btn-primary" type="submit" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Your address updated successfuly.">Update Address</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection