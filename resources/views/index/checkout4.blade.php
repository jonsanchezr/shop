@extends('layouts.indexLayout')
@section('content')
<!-- Page Title--> 
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{asset('assets/img/page-title/shop-pattern.jpg')}});">
      <div class="container text-left align-self-center">
        <h1 class="page-title-heading">Checkout</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-4 mb-2">
      <div class="row">
        <!-- Checkout: Review-->
        <div class="col-xl-9 col-lg-8 pb-5">
          <div class="wizard">
            <div class="wizard-steps d-flex flex-wrap flex-sm-nowrap justify-content-between">
              <a class="wizard-step" href="#"><i class="fe-icon-check-circle"></i>
                1. Address
              </a>
              <a class="wizard-step" href="#"><i class="fe-icon-check-circle"></i>
                2. Shipping
              </a>
              <a class="wizard-step" href="#"><i class="fe-icon-check-circle"></i>
                3. Payment
              </a>
              <div class="wizard-step active">4. Review</div>
            </div>
            <div class="wizard-body">
              <h3 class="h5 pb-3">Review Your Order</h3>
              <!-- Item-->
              @include('includes.reviewYourOrder')
              <div class="text-right pb-4"><span class="text-muted">Subtotal:</span><span class="text-xl font-weight-medium">&nbsp;${{$subTotalCart}}</span></div>
              <div class="row">
                <div class="col-sm-6">
                  <h4 class="h6">Shipping to:</h4>
                  <ul class="list-unstyled">
                    <li><span class="text-muted">Client:&nbsp;</span>{{$step1['first_name']}} {{$step1['last_name']}}</li>
                    <li><span class="text-muted">Address:&nbsp;</span>{{$step1['address_1']}}</li>
                    <li><span class="text-muted">Phone:&nbsp;</span>{{$step1['phone']}}</li>
                  </ul>
                </div>
                <div class="col-sm-6">
                  <h4 class="h6">Payment method:</h4>
                  <ul class="list-unstyled">
                    <li><span class="text-muted">Credit Card:&nbsp;</span>**** **** **** {{substr($step3['card_number'], 12, 4)}}</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="wizard-footer d-flex justify-content-between">
              <button class="btn btn-secondary my-2" type="submit" form="step3">
                <i class="fe-icon-arrow-left"></i>
                <span class="d-none d-sm-inline-block">Back</span>
              </button>
              <button class="btn btn-primary my-2" type="submit" form="step4">
                <span class="d-none d-sm-inline-block">Continue</span>
                <i class="fe-icon-arrow-right"></i>
              </button></div>
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

    <form method="POST" action="@guest /checkout/step_login @else /checkout/step_order @endguest" style="display: none;" id="step4">
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

      @guest
      @else
      <input type="hidden" name="login" value="1" />
      @endguest

    </form>
    <form method="POST" action="/checkout/step_3" id="step3">
      @csrf
    </form>
@endsection