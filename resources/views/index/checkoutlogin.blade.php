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
              <div class="wizard-step" href="#"><i class="fe-icon-check-circle"></i>
                1. Address
              </div>
              <a class="wizard-step" href="#"><i class="fe-icon-check-circle"></i>
                2. Shipping
              </a>
              <a class="wizard-step" href="#"><i class="fe-icon-check-circle"></i>
                3. Payment
              </a>
              <a class="wizard-step" href="#"><i class="fe-icon-check-circle"></i>
                4. Review

              </a>
            </div>
            <div class="wizard-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-muted" for="login-email">E-mail Address <span class='text-danger font-weight-medium'>*</span></label>
                    <input class="form-control" type="email" id="login-email" name="email" form="steplogin" required="">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-muted" for="login-password">Password <span class='text-danger font-weight-medium'>*</span></label>
                    <input class="form-control" type="password" id="login-password" name="password" form="steplogin" required="">                  
                  </div>
                </div>
              </div>
              <button class="btn btn-primary" type="submit" form="stepregister">Register</button>
            </div>
            <div class="wizard-footer d-flex justify-content-between">
              <a class="btn btn-secondary my-2" href="{{ route('cart.index')}}">
                <i class="fe-icon-arrow-left"></i>
                <span class="d-none d-sm-inline-block">Back to cart</span>
              </a>

              <button class="btn btn-primary my-2" type="submit" form="steplogin">
                <span class="d-none d-sm-inline-block">Login</span>
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
    <form method="POST" action="/checkout/step_processlogin" style="display: none;" id="steplogin">
      @csrf
      <input type="hidden" name="first_name" value="{{ $step1['first_name'] }}" />
      <input type="hidden" name="last_name" value="{{ $step1['last_name'] }}" />
      <input type="hidden" name="email" value="{{ $step1['email'] }}" />
      <input type="hidden" name="phone" value="{{ $step1['phone'] }}" />
      <input type="hidden" name="company" value="{{ $step1['company'] }}" />
      <input type="hidden" name="country" value="{{ $step1['country'] }}" />
      <input type="hidden" name="city" value="{{ $step1['city'] }}" />
      <input type="hidden" name="code_postal" value="{{ $step1['code_postal'] }}" />
      <input type="hidden" name="address_1" value="{{ $step1['address_1'] }}" />
      <input type="hidden" name="address_2" value="{{ $step1['address_2'] }}" />

      <input type="hidden" name="id_shipping" value="{{ $step2 }}" />

      <input type="hidden" name="card_number" value="{{ $step3['card_number'] }}" />
      <input type="hidden" name="name" value="{{ $step3['name'] }}" />
      <input type="hidden" name="expire" value="{{ $step3['expire'] }}" />
      <input type="hidden" name="cvc" value="{{ $step3['cvc'] }}" />

    </form>

    <form method="POST" action="/checkout/step_register" style="display: none;" id="stepregister">
      @csrf
      <input type="hidden" name="first_name" value="{{ $step1['first_name'] }}" />
      <input type="hidden" name="last_name" value="{{ $step1['last_name'] }}" />
      <input type="hidden" name="email" value="{{ $step1['email'] }}" />
      <input type="hidden" name="phone" value="{{ $step1['phone'] }}" />
      <input type="hidden" name="company" value="{{ $step1['company'] }}" />
      <input type="hidden" name="country" value="{{ $step1['country'] }}" />
      <input type="hidden" name="city" value="{{ $step1['city'] }}" />
      <input type="hidden" name="code_postal" value="{{ $step1['code_postal'] }}" />
      <input type="hidden" name="address_1" value="{{ $step1['address_1'] }}" />
      <input type="hidden" name="address_2" value="{{ $step1['address_2'] }}" />

      <input type="hidden" name="id_shipping" value="{{ $step2 }}" />

      <input type="hidden" name="card_number" value="{{ $step3['card_number'] }}" />
      <input type="hidden" name="name" value="{{ $step3['name'] }}" />
      <input type="hidden" name="expire" value="{{ $step3['expire'] }}" />
      <input type="hidden" name="cvc" value="{{ $step3['cvc'] }}" />

    </form>

@endsection