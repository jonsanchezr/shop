@extends('layouts.indexLayout')
@section('content')
<!-- Hero Slider-->
<section class="featured-posts-slider d-lg-flex">
  <div class="column">
    <div class="owl-carousel post-preview-img-carousel" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;mouseDrag&quot;: false, &quot;touchDrag&quot;: false, &quot;pullDrag&quot;: false }">
      @foreach($sliders as $slider)
      <a class="post-preview-img" href="{{$slider->url}}" style="background-image: url({{ asset('assets/img/sliders/'.$slider->image) }});"></a>
      @endforeach
    </div>
  </div>
  <div class="column">
    <div class="owl-carousel post-cards-carousel" data-owl-carousel="{ &quot;nav&quot;: true, &quot;dots&quot;: false, &quot;loop&quot;: true, &quot;autoHeight&quot;: true }">
        @foreach($sliders as $slider)
          <div class="card-body"><img class="d-block mb-4" src="{{ asset('assets/img/brands/'.$slider->brand->logo) }}" style="width: 159px !important;" alt="DJI">
            <h2 class="block-title pb-4 mb-3">{{$slider->title}}</h2>
            <p class="lead text-muted pb-3">Starting from <strong>${{formatMoney($slider->amount)}}</strong></p><a class="btn btn-style-5 btn-primary" href="{{$slider->url}}">Shop Now&nbsp;<i class="fe-icon-arrow-right"></i></a>
          </div>
        @endforeach
    </div>
  </div>
</section>

<!-- Top Categories-->
<section class="container pt-5 pb-4 mt-5">
  <h2 class="h4 block-title text-center pt-4 mt-2">Top Categories</h2>
  <div class="owl-carousel carousel-flush pt-3 pb-4" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;630&quot;:{&quot;items&quot;:2},&quot;991&quot;:{&quot;items&quot;:3},&quot;1200&quot;:{&quot;items&quot;:3}} }">
    
    @foreach($topcategories as $top)
    <!-- Product category-->
    <a class="product-category-card mx-auto" href="/categories/{{$top->category->slug}}">
      <div class="product-category-card-thumb">
        <div class="main-img">
          <img src="{{ asset('assets/img/categories/'.$top->category->image) }}" alt="Shop Category"/>
        </div>
      </div>
      <div class="product-category-card-body">
        <div class="product-category-card-meta">Products ({{$top->category->products->count()}})</div>
        <h5 class="product-category-card-title">{{$top->category->title}}</h5>
      </div>
    </a>
    @endforeach

  </div>
  <div class="text-center">
    <a class="btn btn-style-5 btn-primary" href="{{ route('index.allCategories') }}">See all categories</a>
  </div>
</section>
<!-- Offert Limit-->
<section class="container-fluid pt-5">
  @foreach($offerLimits as $offerLimit)
  <div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 mb-30">
      <div class="bg-secondary position-relative pb-5"><span class="badge badge-danger mt-4 ml-4">Limited Offer</span>
        <div class="text-center pt-4">
          <h3 class="font-family-body font-weight-light mb-2">{{$offerLimit->title}}</h3>
          <h2 class="mb-2 pb-1">{{$offerLimit->subtitle}}</h2>
          <h5 class="font-family-body font-weight-light mb-5">{{$offerLimit->description}}</h5>
          <div class="countdown countdown-style-2 h4 mb-3" data-date-time="10/10/2020 12:00" data-labels="{&quot;label-day&quot;: &quot;Days&quot;, &quot;label-hour&quot;: &quot;Hours&quot;, &quot;label-minute&quot;: &quot;Mins&quot;, &quot;label-second&quot;: &quot;Secs&quot;}"></div><br><a class="btn btn-style-5 btn-gradient mb-3" href="/{{$offerLimit->url}}">View Offers</a>
        </div>
      </div>
    </div>
    <div class="col-xl-5 col-lg-6 d-none d-lg-block mb-30"><a class="img-cover" href="{{$offerLimit->url}}" style="background-image: url({{ asset('assets/img/offerLimits/'.$offerLimit->image) }});"></a></div>
  </div>
  @endforeach
</section>
<!-- Ads Index-->
<section class="container-fluid">
  @foreach($adsIndex as $ads)
  <div class="row justify-content-center">
    <div class="col-xl-10 bg-center bg-no-repeat"><a class="d-block" href="{{$ads->url}}"><img class="d-block" src="{{ asset('assets/img/ads/'.$ads->image) }}" alt="Surface Studio"></a></div>
  </div>
  @endforeach
</section>
<!-- Featured Products-->
<section class="container py-5 mb-4">
  <h2 class="h4 block-title text-center pt-3">Featured Products</h2>
  <div class="row pt-4">
   
    <!-- Product-->
    @foreach($products as $product)
    <div class="col-lg-3 col-md-4 col-sm-6 mb-30">
      <div class="product-card mx-auto mb-3">
        <div class="product-head text-right">
          <div class="rating-stars"><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star"></i><i class="fe-icon-star"></i>
          </div>
        </div><a class="product-thumb" href="/products/{{$product->slug}}"><img src="{{ asset('assets/img/products/'.$product->slot_image_1) }}" alt="Product Thumbnail"/></a>
        <div class="product-card-body"><a class="product-meta" href="/categories/{{$product->category->slug}}">{{$product->category->title}}</a>
          <h5 class="product-title"><a href="/products/{{$product->slug}}">{{$product->title}}</a></h5><span class="product-price">${{formatMoney($product->amount)}}</span>
        </div>
        <div class="product-buttons-wrap">
          <div class="product-buttons">
            <div class="product-button">
              <a href="#" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="Product" data-toast-message="added to your wishlist!">
                <i class="fe-icon-heart"></i>
              </a>
            </div>
            <div class="product-button">
              <a href="#" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="Product" data-toast-message="added to comparison table!">
                <i class="fe-icon-repeat"></i>
              </a>
            </div>
            <div class="product-button">
              <a href="/cart/{{$product->id}}/add?unit=1" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Product" data-toast-message="added to cart successfuly!">
                <i class="fe-icon-shopping-cart"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    
  </div>
  <div class="text-center pt-3"><a class="btn btn-style-5 btn-primary" href="{{ route('index.allProducts') }}">View all products</a></div>
</section>
<!-- Product Widgets-->
<section class="container pb-4 mb-2">
  <div class="row">
    <!-- Top Sellers-->
    <div class="col-md-4 col-sm-6">
      <div class="widget widget-featured-products">
        <h3 class="widget-title">Top Sellers</h3>
        @foreach($sellerProducts as $sproduct)
          <a class="featured-product" href="/products/{{$sproduct->slug}}">
            <div class="featured-product-thumb">
              <img src="{{ asset('assets/img/products/'.$sproduct->slot_image_1) }}" alt="Product Image"/>
            </div>
            <div class="featured-product-info">
              <h5 class="featured-product-title">{{$sproduct->title}}</h5>
              <div class="rating-stars">
                <i class="fe-icon-star active"></i>
                <i class="fe-icon-star active"></i>
                <i class="fe-icon-star active"></i>
                <i class="fe-icon-star"></i>
                <i class="fe-icon-star"></i>
              </div><span class="featured-product-price">${{formatMoney($sproduct->amount)}}</span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
    <!-- New Arrivals-->
    <div class="col-md-4 col-sm-6">
      <div class="widget widget-featured-products">
        <h3 class="widget-title">New Arrivals</h3>
        @foreach($products->take(3) as $product)
          <a class="featured-product" href="/products/{{$product->slug}}">
            <div class="featured-product-thumb"><img src="{{ asset('assets/img/products/'.$product->slot_image_1) }}" alt="Product Image"/>
            </div>
            <div class="featured-product-info">
              <h5 class="featured-product-title">{{$product->title}}</h5>
              <div class="rating-stars"><i class="fe-icon-star active"></i>
                <i class="fe-icon-star active"></i>
                <i class="fe-icon-star active"></i>
                <i class="fe-icon-star"></i>
                <i class="fe-icon-star"></i>
              </div><span class="featured-product-price">${{formatMoney($product->amount)}}</span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
    <!-- Best Rated-->
    <div class="col-md-4 col-sm-6">
      <div class="widget widget-featured-products">
        <h3 class="widget-title">Best Rated</h3>
        @foreach($bestProducts as $bproduct)
          <a class="featured-product" href="/products/{{$bproduct->slug}}">
            <div class="featured-product-thumb">
              <img src="{{ asset('assets/img/products/'.$bproduct->slot_image_1) }}" alt="Product Image"/>
            </div>
            <div class="featured-product-info">
              <h5 class="featured-product-title">{{$bproduct->title}}</h5>
              <div class="rating-stars">
                <i class="fe-icon-star active"></i>
                <i class="fe-icon-star active"></i>
                <i class="fe-icon-star active"></i>
                <i class="fe-icon-star active"></i>
                <i class="fe-icon-star active"></i>
              </div><span class="featured-product-price">${{formatMoney($bproduct->amount)}}</span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- Popular Brands-->

<section class="bg-secondary pt-5 pb-4">
  <div class="container pt-3 pb-2">
    <h2 class="h4 block-title text-center">Popular Brands</h2>
    <div class="owl-carousel carousel-flush pt-3" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 3500, &quot;loop&quot;: true, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">

      @foreach($brands as $brand)
      <a class="d-block bg-white box-shadow py-4 py-sm-5 px-2 mb-30" href="#">
        <img class="d-block mx-auto" src="{{ asset('assets/img/brands/'.$brand->logo) }}" style="width: 165px;" alt="Partner">
      </a>
      @endforeach
      
    </div>
  </div>
</section>

<!-- Shop Services-->
<section class="container py-5">
  <div class="row pt-3">
    <div class="col-md-3 col-sm-6 text-center mb-30"><img class="mx-auto mb-4" src="{{ asset('assets/img/shop/services/01.png') }}" width="90" alt="Free Worldwide Shipping">
      <h3 class="text-lg mb-2 text-body">Free Worldwide Shipping</h3>
      <p class="text-sm text-muted mb-0">Free shipping for all orders over $100</p>
    </div>
    <div class="col-md-3 col-sm-6 text-center mb-30"><img class="mx-auto mb-4" src="{{ asset('assets/img/shop/services/02.png') }}" width="90" alt="Money Back Guarantee">
      <h3 class="text-lg mb-2 text-body">Money Back Guarantee</h3>
      <p class="text-sm text-muted mb-0">We return money within 30 days</p>
    </div>
    <div class="col-md-3 col-sm-6 text-center mb-30"><img class="mx-auto mb-4" src="{{ asset('assets/img/shop/services/03.png') }}" width="90" alt="24/7 Customer Support">
      <h3 class="text-lg mb-2 text-body">24/7 Customer Support</h3>
      <p class="text-sm text-muted mb-0">Friendly 24/7 customer support</p>
    </div>
    <div class="col-md-3 col-sm-6 text-center mb-30"><img class="mx-auto mb-4" src="{{ asset('assets/img/shop/services/04.png') }}" width="90" alt="Secure Online Payment">
      <h3 class="text-lg mb-2 text-body">Secure Online Payment</h3>
      <p class="text-sm text-muted mb-0">We posess SSL / Secure Certificate</p>
    </div>
  </div>
</section>
@endsection