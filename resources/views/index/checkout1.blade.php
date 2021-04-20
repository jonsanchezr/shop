@extends('layouts.indexLayout')
@section('content')

<!-- Page Title--> 
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset('assets/img/page-title/shop-pattern.jpg')}});">
      <div class="container text-left align-self-center">
        <h1 class="page-title-heading">Checkout</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-4 mb-2">
      <div class="row">
        <!-- Checkout: Address-->
        <div class="col-xl-9 col-lg-8 pb-5">
          <div class="wizard">
            <div class="wizard-steps d-flex flex-wrap flex-sm-nowrap justify-content-between">
              <div class="wizard-step active">
                1. Address
              </div>
              <a class="wizard-step" href="#">
                2. Shipping
              </a>
              <a class="wizard-step" href="#">
                3. Payment
              </a>
              <a class="wizard-step" href="#">
                4. Review
              </a>
            </div>
            <h3 class="h5 pt-3 pb-2">Shipping Address</h3>
            @guest
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="same-address">
                <label class="custom-control-label" for="same-address">Same as billing address</label>
              </div>
              <div class="wizard-body">
                <h3 class="h5 pb-2">Billing Address</h3>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-fn">First Name <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="text" id="checkout-fn" name="first_name" form="step1" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-ln">Last Name <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="text" id="checkout-ln" name="last_name" form="step1" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-email">E-mail Address <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="email" id="checkout-email" name="email" form="step1" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-phone">Phone Number <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="text" id="checkout-phone" name="phone" form="step1" required="">                  
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-company">Company</label>
                      <input class="form-control" type="text" id="checkout-company" name="company" form="step1">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-country">Country <span class='text-danger font-weight-medium'>*</span></label>
                      <select class="form-control" id="checkout-country" name="country" form="step1" required="">
                        <option>Choose country</option>
                        <option>Australia</option>
                        <option>Canada</option>
                        <option>France</option>
                        <option>Germany</option>
                        <option>Switzerland</option>
                        <option>USA</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-city">City</label>
                      <input type="text" class="form-control" id="checkout-city" name="city" form="step1">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-zip">Code Postal <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="text" id="checkout-zip" name="code_postal" form="step1" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-address-1">Address 1 <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="text" id="checkout-address-1" name="address_1" form="step1" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-address-2">Address 2</label>
                      <input class="form-control" type="text" id="checkout-address-2" name="address_2" form="step1">
                    </div>
                  </div>
                </div>
              </div>
            @else
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" checked id="same-address">
                <label class="custom-control-label" for="same-address">Same as billing address</label>
              </div>
              <div class="wizard-body">
                <h3 class="h5 pb-2">Billing Address</h3>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-fn">First Name <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="text" id="checkout-fn" name="first_name" value="{{$address[0]['first_name']}}" form="step1" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-ln">Last Name <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="text" id="checkout-ln" name="last_name" value="{{$address['0']['last_name']}}" form="step1" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-email">E-mail Address <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="email" id="checkout-email" name="email" value="{{$address['0']['email']}}" form="step1" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-phone">Phone Number <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="text" id="checkout-phone" name="phone" value="{{$address['0']['phone']}}" form="step1" required="">                  
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-company">Company</label>
                      <input class="form-control" type="text" id="checkout-company" name="company" value="{{$address['0']['company']}}" form="step1">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-country">Country <span class='text-danger font-weight-medium'>*</span></label>
                      <select class="form-control" id="checkout-country" name="country" value="{{$address['0']['country']}}" form="step1" required="">
                        <option>{{$address['0']['country']}}</option>
                        <option>Australia</option>
                        <option>Canada</option>
                        <option>France</option>
                        <option>Germany</option>
                        <option>Switzerland</option>
                        <option>USA</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-city">City</label>
                      <input type="text" class="form-control" id="checkout-city" name="city" value="{{$address['0']['city']}}" form="step1">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-zip">Code Postal <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="text" id="checkout-zip" name="code_postal" value="{{$address['0']['code_postal']}}" form="step1" required="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-address-1">Address 1 <span class='text-danger font-weight-medium'>*</span></label>
                      <input class="form-control" type="text" id="checkout-address-1" name="address_1" value="{{$address['0']['address_1']}}" form="step1" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-address-2">Address 2</label>
                      <input class="form-control" type="text" id="checkout-address-2" name="address_2" value="{{$address['0']['address_2']}}" form="step1">
                    </div>
                  </div>
                </div>
              </div>
            @endguest
            <div class="wizard-footer d-flex justify-content-between">
              <a class="btn btn-secondary my-2" href="{{ route('cart.index')}}">
                <i class="fe-icon-arrow-left"></i>
                <span class="d-none d-sm-inline-block">Back to cart</span>
              </a>

              <button class="btn btn-primary my-2" type="submit" form="step1">
                <span class="d-none d-sm-inline-block">Continue</span>
                <i class="fe-icon-arrow-right"></i>
              </button>
            </div>
          </div>
        </div>
        <!-- Sidebar-->
        <aside class="col-xl-3 col-lg-4 pb-4 mb-2">
          <!-- Order Summary-->
          @include('includes.orderSummary')
          <!-- Recent Products-->
          @include('includes.recentProductsCheckout')
          <!-- Promo Banner-->
          @include('includes.adsCheckout')
        </aside>
      </div>
    </div>
    <form method="POST" action="/checkout/step_2" style="display: none;" id="step1">
      @csrf
    </form>

@endsection