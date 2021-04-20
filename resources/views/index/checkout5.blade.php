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
              <div class="wizard-step" href="#"><i class="fe-icon-check-circle"></i>
              4. Review
            </div>
          </div>
          <div class="wizard-body">
            <h3 class="h5 pb-3">Review Your Order</h3>
            <!-- Item-->
            @include('includes.reviewYourOrder')
            <div class="text-right pb-4"><span class="text-muted">Subtotal:</span><span class="text-xl font-weight-medium">&nbsp;{{$subTotalCart}}</span></div>
            <div class="row">
              <div class="col-sm-6">
                <h4 class="h6">Shipping to:</h4>
                <ul class="list-unstyled">
                  <li><span class="text-muted">Client:&nbsp;</span>{{$order['step1']['first_name']}} {{$order['step1']['last_name']}}</li>
                  <li><span class="text-muted">Address:&nbsp;</span>{{$order['step1']['address_1']}}</li>
                  <li><span class="text-muted">Phone:&nbsp;</span>{{$order['step1']['phone']}}</li>
                </ul>
              </div>
              <div class="col-sm-6">
                <h4 class="h6">Payment method:</h4>
                <ul class="list-unstyled">
                  <li><span class="text-muted">Credit Card:&nbsp;</span>**** **** **** {{substr($order['step3']['card_number'], 12, 4)}}</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="wizard-footer d-flex justify-content-between"><a class="btn btn-secondary my-2" href="{{route('cart.index')}}"><i class="fe-icon-arrow-left"></i><span class="d-none d-sm-inline-block">Back</span></a><button class="btn btn-primary my-2" type="submit" form="step5">Complete Order</button></div>
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

    <form method="POST" action="{{route('checkout.checkoutStep_order')}}" style="display: none;" id="step5">
      @csrf
    </form>
@endsection