@extends('layouts.indexLayout')
@section('content')
	<!-- Page Title-->
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset('assets/img/page-title/shop-pattern.jpg') }});">
      <div class="container text-left align-self-center"> 
        <h1 class="page-title-heading">Cart</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-2">
      <!-- Alert
      <div class="alert alert-info alert-dismissible fade show text-center mb-30"><span class="close" data-dismiss="alert"></span><i class="fe-icon-award"></i>&nbsp;&nbsp;With this purchase you will earn <strong>2,549</strong> Reward Points.</div>-->

      <!-- Cart Item-->
      @foreach(Session::get('products') as $p)
        @foreach($products as $product)
          @if($p['id'] == $product->id)
          <div class="cart-item d-md-flex justify-content-between">
            <span class="remove-item" onclick="event.preventDefault(); deleteCart({{$product->id}})">
              <i class="fe-icon-x"></i>
            </span>
            <div class="px-3 my-3">
              <a class="cart-item-product" href="/products/{{$product->slug}}">
                <div class="cart-item-product-thumb">
                  <img src="{{ asset('assets/img/products/'.$product->slot_image_1) }}" alt="Product">
                </div>
                <div class="cart-item-product-info">
                  <h4 class="cart-item-product-title">{{$product->title}}</h4>
                  <span><strong>Categoria:</strong> {{$product->category->title}}</span>
                  <span><strong>Color:</strong> No Aplica</span>
                </div>
              </a>
            </div>
            <div class="px-3 my-3 text-center">
              <div class="cart-item-label">Quantity</div>
              <div class="count-input">
                {{$p['unit']}}
              </div>
            </div>
            <div class="px-3 my-3 text-center">
              <div class="cart-item-label">Subtotal</div><span class="text-xl font-weight-medium">${{formatMoney($product->amount)}}</span>
            </div>
            <div class="px-3 my-3 text-center">
              <div class="cart-item-label">Discount</div><span class="text-xl font-weight-medium">—</span>
            </div>
          </div>
          @endif
        @endforeach
      @endforeach
      <!-- Coupon + Subtotal-->
      <div class="d-sm-flex justify-content-between align-items-center text-center text-sm-left">
        <form class="form-inline py-2">
          <label class="sr-only">Coupon code</label>
          <input class="form-control form-control-sm my-2 mr-3" type="text" placeholder="Coupon code" required>
          <button class="btn btn-secondary btn-sm my-2 mx-auto mx-sm-0" type="submit">Apply Coupon</button>
        </form>
        <div class="py-2"><span class="d-inline-block align-middle text-sm text-muted font-weight-medium text-uppercase mr-2">Subtotal:</span>

          <span class="d-inline-block align-middle text-xl font-weight-medium">${{$subTotalCart}}</span>
          
        </div>
      </div>
      <!-- Buttons-->
      <hr class="my-2">
      <div class="row pt-3 pb-5 mb-2">
        <div class="col-sm-6 mb-3"><a class="btn btn-secondary btn-block" href="/cart/empty"><i class="fe-icon-refresh-ccw"></i>&nbsp;Vaciar Cart</a></div>
        <div class="col-sm-6 mb-3"><a class="btn btn-primary btn-block" href="{{ route('checkout.checkoutStep_1') }}"><i class="fe-icon-credit-card"></i>&nbsp;Checkout</a></div>
      </div>
      <!-- Related Products Carousel-->
      <h3 class="h4 text-center pb-4">You May Also Like</h3>
      <div class="owl-carousel carousel-flush" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true,&quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
        <!-- Product-->
        @foreach($productLike as $p)
          <div class="product-card mx-auto mb-5">
            <div class="product-head text-right">
              <div class="rating-stars"><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star"></i><i class="fe-icon-star"></i>
              </div>
            </div><a class="product-thumb" href="/products/{{$p->slug}}"><img src="{{ asset('assets/img/products/'.$p->slot_image_1) }}" alt="Product Thumbnail"/></a>
            <div class="product-card-body"><a class="product-meta" href="/categories/{{$p->category->slug}}">{{$p->category->title}}</a>
              <h5 class="product-title"><a href="/products/{{$p->slug}}">{{$p->title}}</a></h5><span class="product-price">${{formatMoney($p->amount)}}</span>
            </div>
            <div class="product-buttons-wrap">
              <div class="product-buttons">
                <div class="product-button"><a href="#" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="Product" data-toast-message="added to your wishlist!"><i class="fe-icon-heart"></i></a></div>
                <div class="product-button"><a href="#" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="Product" data-toast-message="added to comparison table!"><i class="fe-icon-repeat"></i></a></div>
                <div class="product-button"><a href="/cart/{{$p->id}}/add?unit=1" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Product" data-toast-message="added to cart successfuly!"><i class="fe-icon-shopping-cart"></i></a></div>
              </div>
            </div>
          </div>
        @endforeach
        
      </div>
    </div>
    <script type="text/javascript">
      function deleteCart(id) {
        window.location.replace('/cart/'+id+'/delete')
      }
    </script>
@endsection