@extends('layouts.indexLayout')
@section('content')
    
<!-- Page Content-->
<div class="container mb-2">
  <div class="row">
    <!-- Product Gallery-->
    <div class="col-md-6 pb-5">
      <div class="product-gallery"><span class="badge badge-danger text-md font-weight-normal">Sale</span>
        <div class="product-carousel owl-carousel">

          <a class="gallery-item" href="{{ asset('assets/img/products/'.$product->slot_image_1) }}" data-fancybox="gallery1" data-hash="one"><img src="{{ asset('assets/img/products/'.$product->slot_image_1) }}" alt="Product">
          </a>

          
          <a class="gallery-item" href="{{ asset('assets/img/products/'.$product->slot_image_2) }}" data-fancybox="gallery1" data-hash="two"><img src="{{ asset('assets/img/products/'.$product->slot_image_2) }}" alt="Product">
          </a>         

          <a class="gallery-item" href="{{ asset('assets/img/products/'.$product->slot_image_3) }}" data-fancybox="gallery1" data-hash="three"><img src="{{ asset('assets/img/products/'.$product->slot_image_3) }}" alt="Product">
          </a>
          
          <a class="gallery-item" href="{{ asset('assets/img/products/'.$product->slot_image_4) }}" data-fancybox="gallery1" data-hash="four"><img src="{{ asset('assets/img/products/'.$product->slot_image_4) }}" alt="Product"></a>
    
        </div>

        <ul class="product-thumbnails">
          <li class="active">
            <a href="#one">
              <img src="{{ asset('assets/img/products/'.$product->slot_image_1) }}" alt="Product">
            </a>
          </li>

          @if($product->slot_image_2 != '')
          <li>
            <a href="#two">
              <img src="{{ asset('assets/img/products/'.$product->slot_image_2) }}" alt="Product">
            </a>
          </li>
          @endif

          @if($product->slot_image_3 != '')
          <li>
            <a href="#three">
              <img src="{{ asset('assets/img/products/'.$product->slot_image_3) }}" alt="Product">
            </a>
          </li>
          @endif

          @if($product->slot_image_4 != '')
          <li>
            <a href="#four">
              <img src="{{ asset('assets/img/products/'.$product->slot_image_4) }}" alt="Product">
            </a>
          </li>
          @endif

          <li>
            <a class="navi-link text-sm" href="https://www.youtube.com/embed/CjNjcrQZtd8" data-fancybox data-width="960" data-height="640">
              <i class="fe-icon-video text-lg d-block mb-1"></i>Watch Video
            </a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Product Info-->
    <div class="col-md-6 pb-5">
      <div class="product-meta"><i class="fe-icon-bookmark"></i>
        <a href="#">Drones,</a>
        <a href="#">Action cameras</a>
      </div>
      <h2 class="h3 font-weight-bold">{{$product->title}}</h2>
      <h3 class="h4 font-weight-light">
        <!--<del class="text-muted">$958.00</del>&nbsp;-->${{formatMoney($product->amount)}}
      </h3>
      <p class="text-muted">{{$product->short_description}}</p>
      
      <!--<div class="row mt-4">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="size">Choose color</label>
            <select class="form-control" id="size">
              <option>White/Gray/Black</option>
              <option>Black</option>
              <option>Black/White/Red</option>
            </select>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="color">Battery capacity</label>
            <select class="form-control" id="color">
              <option>5100 mAh</option>
              <option>6200 mAh</option>
              <option>8000 mAh</option>
            </select>
          </div>
        </div>
      </div>-->
      <div class="row align-items-end pb-4">
          <div class="col-sm-4">
            <div class="form-group mb-0">
              <label for="quantity">Quantity</label>
              <select class="form-control" name="unit" id="quantity" form="addCart">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="pt-4 hidden-sm-up"></div>
            <button onclick="addCart()" type="submit" class="btn btn-primary btn-block m-0" data-toast data-toast-type="success" data-toast-position="topRight" data-toast-icon="fe-icon-check-circle" data-toast-title="Product" data-toast-message="successfuly added to cart!"><i class="fe-icon-shopping-cart" form="addCart"></i> Add to Cart</button>
          </div>
      </div> 
      <div class="pt-1 mb-4"><span class="text-medium">SKU:</span> #21457832</div>
      <hr class="mb-2">
      <div class="d-flex flex-wrap justify-content-between align-items-center">
        <div class="mt-2 mb-2">
          <button class="btn btn-danger btn-sm my-2 mr-1" data-toast data-toast-type="info" data-toast-position="topRight" data-toast-icon="fe-icon-info" data-toast-title="Product" data-toast-message="added to your wishlist!"><i class="fe-icon-heart"></i>&nbsp;Wishlist</button>
          <button class="btn btn-info btn-sm my-2" data-toast data-toast-type="info" data-toast-position="topRight" data-toast-icon="fe-icon-info" data-toast-title="Product" data-toast-message="added to comparison table!"><i class="fe-icon-repeat"></i>&nbsp;Compare</button>
        </div>
        <div class="mt-2 mb-2"><span class="text-muted d-inline-block align-middle mb-2">Share:&nbsp;&nbsp;</span>
          <div class="d-inline-block"><a class="social-btn sb-style-3 sb-facebook my-1" href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="socicon-facebook"></i></a><a class="social-btn sb-style-3 sb-twitter my-1" href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="socicon-twitter"></i></a><a class="social-btn sb-style-3 sb-instagram my-1" href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="socicon-instagram"></i></a><a class="social-btn sb-style-3 sb-google-plus my-1 mr-0" href="#" data-toggle="tooltip" data-placement="top" title="Google +"><i class="socicon-googleplus"></i></a></div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Product Details-->
<div class="bg-secondary pt-5 pb-4" id="details">
  <div class="container py-2">
    {!! $product->large_description !!}
  </div>
</div>
<!-- Reviews-->
<!--<div class="container pt-5">
  <div class="row pt-2">
    <div class="col-md-4 pb-5 mb-3">
      <div class="card border-default">
        <div class="card-body">
          <div class="text-center">
            <div class="d-inline align-baseline display-4 mr-1">4.2</div>
            <div class="d-inline align-baseline text-sm text-warning mr-2">
              <div class="rating-stars"><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star"></i>
              </div>
            </div>
          </div>
          <div class="pt-3"><span class="progress-label">5 stars <span class='text-muted'>- 38</span></span>
            <div class="progress progress-style-3 mb-3">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div><span class="progress-label">4 stars <span class='text-muted'>- 10</span></span>
            <div class="progress progress-style-3 mb-3">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%;;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div><span class="progress-label">3 stars <span class='text-muted'>- 3</span></span>
            <div class="progress progress-style-3 mb-3">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 7%;" aria-valuenow="7" aria-valuemin="0" aria-valuemax="100"></div>
            </div><span class="progress-label">2 stars <span class='text-muted'>- 1</span></span>
            <div class="progress progress-style-3 mb-3">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 3%;" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
            </div><span class="progress-label">1 star <span class='text-muted'>- 0</span></span>
            <div class="progress progress-style-3 mb-3">
              <div class="progress-bar bg-warning" role="progressbar" style="width: 0;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="pt-3"><a class="btn btn-warning btn-block" href="#" data-toggle="modal" data-target="#leaveReview">Leave a Review</a></div>
        </div>
      </div>
    </div>
    <div class="col-md-8 pb-5 mb-3">
      <div class="d-flex flex-wrap justify-content-between pb-2">
        <h3 class="h4">Latest Reviews</h3><a class="btn btn-primary btn-sm" href="#">View All Reviews</a>
      </div>-->
      <!-- Review-->
      <!--<div class="blockquote comment mb-4">
        <div class="d-sm-flex mb-2">
          <h6 class="text-lg mb-0">My husband love his new...</h6><span class="d-none d-sm-inline mx-3 text-muted opacity-50">|</span>
          <div class="rating-stars"><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star"></i>
          </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nostrud...</p>
        <footer class="testimonial-footer">
          <div class="testimonial-avatar"><img src="img/testimonials/01.jpg" alt="Review Author Avatar"/>
          </div>
          <div class="d-table-cell align-middle pl-2">
            <div class="blockquote-footer">Barbara Palson
              <cite>August 12, 2018 at 3:10PM</cite>
            </div>
          </div>
        </footer>
      </div>-->
      <!-- Review-->
      <!--<div class="blockquote comment">
        <div class="d-sm-flex mb-2">
          <h6 class="text-lg mb-0">Awesome quality for the price</h6><span class="d-none d-sm-inline mx-3 text-muted opacity-50">|</span>
          <div class="rating-stars"><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i>
          </div>
        </div>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Utenim ad minim veniam, quis nostrud. Nam libero tempore...</p>
        <footer class="testimonial-footer">
          <div class="testimonial-avatar"><img src="{{ asset('assets/img/testimonials/02.jpg') }}" alt="Review Author Avatar"/>
          </div>
          <div class="d-table-cell align-middle pl-2">
            <div class="blockquote-footer">Hinata Nakamura
              <cite>July 25, 2018 at 11:50AM</cite>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
</div>-->

<div class="container pt-3 pb-5">
  <!-- Related Products Carousel-->
  <h3 class="h4 text-center pb-4">You May Also Like</h3>
  <div class="owl-carousel carousel-flush" data-owl-carousel="{ &quot;nav&quot;: false, &quot;dots&quot;: true,&quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;576&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
    <!-- Product-->
    @foreach($products as $p)
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
<form id="addCart" action="/cart/{{$product->id}}/add" method="GET">
  @csrf
</form>

<script type="text/javascript">
function addCart() {
  let formAdd = document.getElementById('addCart');
  formAdd.submit();
}
</script>

@endsection