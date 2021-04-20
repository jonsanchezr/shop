<div class="widget">
  <h4 class="widget-title">Order Summary</h4>
  <div class="d-flex justify-content-between pb-2">
    <div>Cart subtotal:</div>
    <div class="font-weight-medium">${{$subTotalCart}}</div>
  </div>
  <div class="d-flex justify-content-between pb-2">
    <div>Shipping:</div> 
      @if( !isset($step2))  
        <div class="font-weight-medium">${{formatMoney($shippingCompanies[0]->price)}}</div>
      @else
        @foreach($shippingCompanies as $shipping)
          @if($step2 == $shipping->id)
            <div class="font-weight-medium">${{formatMoney($shipping->price)}}</div>
          @endif
        @endforeach
      @endif   
  </div>
  <div class="d-flex justify-content-between pb-2">
    <div>Estimated tax:</div>
    <div class="font-weight-medium">%{{$tax['0']['amount']}}</div>
  </div>
  <hr>
  <div class="pt-3 text-right text-lg font-weight-medium">${{$subTotalCart}}</div>
</div>