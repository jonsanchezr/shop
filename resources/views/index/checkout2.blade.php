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
        <!-- Checkout: Shipping-->
        <div class="col-xl-9 col-lg-8 pb-5">
          <div class="wizard">
            <div class="wizard-steps d-flex flex-wrap flex-sm-nowrap justify-content-between">
              <a class="wizard-step" href="#">
                <i class="fe-icon-check-circle"></i>
                1. Address
              </a>
              <div class="wizard-step active">
                2. Shipping
              </div>

              <a class="wizard-step" href="#">
                3. Payment
              </a>
              <a class="wizard-step" href="#">
                4. Review
              </a>
            </div>
            <div class="wizard-body">
              <h3 class="h5 pb-3">Choose Shipping Method</h3>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="align-middle"></th>
                      <th class="align-middle">Shipping method</th>
                      <th class="align-middle">Delivery time</th>
                      <th class="align-middle">Handling fee</th>
                    </tr>
                  </thead>
                  <tbody>
                  <tbody>
                    @foreach($shippingCompanies as $shippingCompany)
                      <tr>
                        <td>
                          <div class="custom-control custom-radio mb-4">
                            @if($shippingCompany->id == 1)
                            <input class="custom-control-input" type="radio" id="{{$shippingCompany->name}}" name="id_shipping" form="step2" checked value="{{$shippingCompany->id}}">
                            @else
                            <input class="custom-control-input" type="radio" id="{{$shippingCompany->name}}" name="id_shipping" form="step2" disabled value="{{$shippingCompany->id}}">
                            @endif
                            <label class="custom-control-label" for="{{$shippingCompany->name}}"></label>

                          </div>
                        </td>
                        <td class="align-middle"><span class="text-gray-dark">{{$shippingCompany->name}}</span><br><span class="text-muted text-sm">{{$shippingCompany->description}}</span></td>
                        <td class="align-middle">{{$shippingCompany->delivery_time}}</td>
                        <td class="align-middle">${{$shippingCompany->price}}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="wizard-footer d-flex justify-content-between"><a class="btn btn-secondary my-2" href="/checkout/step_1"><i class="fe-icon-arrow-left"></i><span class="d-none d-sm-inline-block">Back</span></a><button class="btn btn-primary my-2" type="submit" form="step2" ><span class="d-none d-sm-inline-block">Continue</span><i class="fe-icon-arrow-right"></i></button></div>
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
<form method="POST" action="/checkout/step_3" style="display: none;" id="step2">
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
</form>

@endsection