
<div class="widget widget-featured-products">
  <h4 class="widget-title">Recrently Viewed</h4>
  @foreach($products->take(3) as $product)
  <a class="featured-product" href="/products/{{$product->slug}}">
    <div class="featured-product-thumb">
      <img src="{{ asset('assets/img/products/'.$product->slot_image_1)}}" alt="Product Image"/>
    </div>
    <div class="featured-product-info">
      <h5 class="featured-product-title">{{$product->title}}</h5>
      <div class="rating-stars">
        <i class="fe-icon-star active"></i>
        <i class="fe-icon-star active"></i>
        <i class="fe-icon-star active"></i>
        <i class="fe-icon-star active"></i>
        <i class="fe-icon-star"></i>
      </div>
      <span class="featured-product-price">${{$product->amount}}</span>
    </div>
  </a>
  @endforeach
</div>
