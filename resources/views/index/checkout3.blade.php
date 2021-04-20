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
    <!-- Checkout: Payment-->
    <div class="col-xl-9 col-lg-8 pb-5">
      <div class="wizard">
        <div class="wizard-steps d-flex flex-wrap flex-sm-nowrap justify-content-between"><a class="wizard-step" href="#"><i class="fe-icon-check-circle"></i>1. Address</a><a class="wizard-step" href="#"><i class="fe-icon-check-circle"></i>2. Shipping</a>
          <div class="wizard-step active">3. Payment</div><a class="wizard-step" href="#">4. Review</a>
        </div>
        <div class="wizard-body">
          <h3 class="h5 pb-3">Choose Payment Method</h3>
          <div class="accordion accordion-style-2" id="accordion" role="tablist">
            <div class="card">
              <div class="card-header" role="tab">
                <h6><a class="pl-0" href="#card" data-toggle="collapse"><i class="fe-icon-credit-card"></i>Pay with Credit Card</a></h6>
              </div>
             <div class="collapse show" id="card" data-parent="#accordion" role="tabpanel">
                <div class="card-body px-0">
                  <p>We accept following credit cards:&nbsp;&nbsp;<img class="d-inline-block align-middle" src="{{asset('assets/img/credit-cards.png')}}" style="width: 120px;" alt="Cerdit Cards"></p>
                  <div class="card-wrapper"></div>
                  @guest
                    <form class="interactive-credit-card row">
                      <div class="form-group col-sm-6">
                        <input class="form-control" type="text" name="card_number" placeholder="Card Number" form="step3" required>
                      </div>
                      <div class="form-group col-sm-6">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" form="step3" required>
                      </div>
                      <div class="form-group col-sm-3">
                        <input class="form-control" type="text" name="expire" placeholder="MM/YY" form="step3" required>
                      </div>
                      <div class="form-group col-sm-3">
                        <input class="form-control" type="text" name="cvc" placeholder="CVC" form="step3" required>
                      </div>
                      <div class="col-sm-6">
                        <button class="btn btn-primary btn-block mt-0" type="submit" form="step3">Submit</button>
                      </div>
                    </form>
                  @else
                    <form class="interactive-credit-card row">
                      <div class="form-group col-sm-6">
                        <input class="form-control" type="text" name="card_number" value="{{$creditCart[0]['card_number']}}" form="step3" required>
                      </div>
                      <div class="form-group col-sm-6">
                        <input class="form-control" type="text" name="name" value="{{$creditCart[0]['name']}}" form="step3" required>
                      </div>
                      <div class="form-group col-sm-3">
                        <input class="form-control" type="text" name="expire" value="{{$creditCart[0]['expire']}}" form="step3" required>
                      </div>
                      <div class="form-group col-sm-3">
                        <input class="form-control" type="text" name="cvc" value="{{$creditCart[0]['cvc']}}" form="step3" required>
                      </div>
                      <div class="col-sm-6">
                        <button class="btn btn-primary btn-block mt-0" type="submit" form="step3">Submit</button>
                      </div>
                    </form>
                  @endguest
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab">
                <h6><a class="collapsed pl-0" href="#paypal" data-toggle="collapse"><i class="socicon-paypal"></i>Pay with PayPal</a></h6>
              </div>
              <div class="collapse" id="paypal" data-parent="#accordion" role="tabpanel">
                <div class="card-body px-0">
                  <p><strong>PayPal</strong> - the safer, easier way to pay</p>
                  <form class="row" method="post">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control" type="email" placeholder="E-mail" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <input class="form-control" type="password" placeholder="Password" required>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="d-flex flex-wrap justify-content-between align-items-center"><a class="navi-link" href="#">Forgot password?</a>
                        <button class="btn btn-primary btn-sm" type="submit">Log In</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab">
                <h6><a class="collapsed pl-0" href="#points" data-toggle="collapse"><i class="fe-icon-award"></i>Redeem Reward Points</a></h6>
              </div>
              <div class="collapse" id="points" data-parent="#accordion" role="tabpanel">
                <div class="card-body px-0">
                  <p>You currently have<strong>&nbsp;2,549</strong>&nbsp;Reward Points to spend.</p>
                  <div class="custom-control custom-checkbox d-block">
                    <input class="custom-control-input" type="checkbox" id="use_points">
                    <label class="custom-control-label" for="use_points">Use my Reward Points to pay for this order.</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="wizard-footer d-flex justify-content-between">
          <button class="btn btn-secondary my-2" type="submit" form="step2">
            <i class="fe-icon-arrow-left"></i>
            <span class="d-none d-sm-inline-block">Back</span>
          </button>
          <a class="btn btn-primary my-2" href="checkout-review.html">
            <span class="d-none d-sm-inline-block">Continue</span>
            <i class="fe-icon-arrow-right"></i>
          </a>
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

<form method="POST" action="/checkout/step_4" style="display: none;" id="step3">
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
</form>
<form method="POST" action="/checkout/step_2" id="step2">
  @csrf
</form>

@endsection