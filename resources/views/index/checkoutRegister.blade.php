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
                    <label for="reg-fn">UserName <span class='text-danger font-weight-medium'>*</span></label>
                    <input class="form-control" type="text" required id="reg-fn" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" form="stepregister" autofocus>
                    <div class="invalid-feedback">Please enter username!</div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-fn">First Name <span class='text-danger font-weight-medium'>*</span></label>
                    <input class="form-control" type="text" required id="reg-fn" value="{{ $step1['first_name'] }}" name="first_name" form="stepregister">
                    <div class="invalid-feedback">{{$step1['first_name']}}</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-ln">Last Name <span class='text-danger font-weight-medium'>*</span></label>
                    <input class="form-control" type="text" required id="reg-ln" value="{{ $step1['last_name'] }}" name="last_name" form="stepregister">
                    <div class="invalid-feedback">{{$step1['last_name']}}</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-email">E-mail Address <span class='text-danger font-weight-medium'>*</span></label>
                    <input cid="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" required id="reg-email" value="{{ $step1['email'] }}" form="stepregister">
                    <div class="invalid-feedback">{{$step1['email']}}</div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-phone">Phone Number <span class='text-danger font-weight-medium'>*</span></label>
                    <input class="form-control" type="text" required id="reg-phone" name="phone" value="{{ $step1['phone'] }}"form="stepregister">
                    <div class="invalid-feedback">value="{{ $step1['phone'] }}</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-phone">Identity <span class='text-danger font-weight-medium'>*</span></label>
                    <input class="form-control" type="text" required name="identity" form="stepregister">
                    <div class="invalid-feedback">Please enter identity!</div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-password">Password <span class='text-danger font-weight-medium'>*</span></label>
                    <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" type="password" required id="password" form="stepregister">
                    <div class="invalid-feedback">Please enter password!</div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-password-confirm">Confirm Password <span class='text-danger font-weight-medium'>*</span></label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" form="stepregister">
                    <div class="invalid-feedback">Passwords do not match!</div>
                  </div>
                </div>
              </div>
            </div>
            <div class="wizard-footer d-flex justify-content-between">
              <a class="btn btn-secondary my-2" href="{{ route('cart.index')}}">
                <i class="fe-icon-arrow-left"></i>
                <span class="d-none d-sm-inline-block">Back to cart</span>
              </a>
              <button class="btn btn-primary my-2" type="submit" form="stepregister">
                <span class="d-none d-sm-inline-block">register</span>
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
    <form method="POST" action="/checkout/step_processregister" style="display: none;" id="stepregister">
      @csrf
      <input type="hidden" name="first_name" value="{{ $step1['first_name'] }}" />
      <input type="hidden" name="last_name" value="{{ $step1['last_name'] }}" />
      <input type="hidden" name="phone" value="{{ $step1['phone'] }}" />
      <input type="hidden" name="company" value="{{ $step1['company'] }}" />
      <input type="hidden" name="country" value="{{ $step1['country'] }}" />
      <input type="hidden" name="city" value="{{ $step1['city'] }}" />
      <input type="hidden" name="code_postal" value="{{ $step1['code_postal'] }}" />
      <input type="hidden" name="address_1" value="{{ $step1['address_1'] }}" />
      <input type="hidden" name="address_2" value="{{ $step1['address_2'] }}" />

      <input type="hidden" name="id_shipping" value="{{ $step2 }}" />

      <input type="hidden" name="card_number" value="{{ $step3['card_number'] }}" />
      <input type="hidden" name="expire" value="{{ $step3['expire'] }}" />
      <input type="hidden" name="cvc" value="{{ $step3['cvc'] }}" />

    </form>

@endsection