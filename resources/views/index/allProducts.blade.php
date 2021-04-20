@extends('layouts.indexLayout')
@section('content')

    <!-- Page Title-->
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset('assets/img/page-title/shop-pattern.jpg') }});">
      <div class="container text-left align-self-center">
        <h1 class="page-title-heading">Products</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-5 mb-3">
      <div class="row">
        <div class="col-lg-3">
          <!-- Shop Sidebar-->
          <!-- Off-Canvas Toggle--><a class="offcanvas-toggle" href="#shop-sidebar" data-toggle="offcanvas"><i class="fe-icon-sidebar"></i></a>
          <!-- Off-Canvas Container-->
          <aside class="offcanvas-container" id="shop-sidebar">
            <div class="offcanvas-scrollable-area px-4 pt-5 px-lg-0 pt-lg-0"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>
              <!-- Categories-->
              <div class="widget widget-categories">
                <h4 class="widget-title">Shop categories</h4>
                <ul>
                  @foreach($categories as $category)
                  <li>
                    <a href="/categories/{{$category->slug}}">{{$category->title}}<span>&nbsp;({{$category->products->count()}})</span></a>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!-- Price range-->
              <div class="widget">
                <h4 class="widget-title">Price range</h4>
                <form class="range-slider" method="post" data-start-min="250" data-start-max="650" data-min="0" data-max="1000" data-step="1">
                  <div class="ui-range-slider"></div>
                  <footer class="ui-range-slider-footer">
                    <div class="column">
                      <button class="btn btn-primary btn-xs" type="submit">Filter</button>
                    </div>
                    <div class="column">
                      <div class="ui-range-values">
                        <div class="ui-range-label">Price:</div>
                        <div class="ui-range-value-min">$<span></span>
                          <input type="hidden">
                        </div>&nbsp;&ndash;&nbsp;
                        <div class="ui-range-value-max">$<span></span>
                          <input type="hidden">
                        </div>
                      </div>
                    </div>
                  </footer>
                </form>
              </div>
              <!-- Filter by brand-->
              <div class="widget">
                <h4 class="widget-title">Filter by brand</h4>
                @foreach($brands as $brand)
                <div class="custom-control custom-checkbox">
                  <input class="custom-control-input" type="checkbox" id="{{$brand->name}}">
                  <label class="custom-control-label" for="{{$brand->name}}">{{$brand->name}}&nbsp;<span class="text-muted">({{$brand->products->count()}})</span></label>
                </div>
                @endforeach

              </div>
              <!-- Popular products-->
              <div class="widget widget-featured-products">
                <h4 class="widget-title">Popular products</h4>

                @foreach($products->take(3) as $product)
                  <a class="featured-product" href="/products/{{$product->slug}}">
                    <div class="featured-product-thumb">
                      <img src="{{asset('assets/img/products/'.$product->slot_image_1)}}" alt="Product Image"/>
                    </div>
                    <div class="featured-product-info">
                      <h5 class="featured-product-title">{{$product->title}}</h5>
                      <div class="rating-stars">
                        <i class="fe-icon-star active"></i>
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
          </aside>
        </div>
        <div class="col-lg-9">
          <!-- Shop Toolbar-->
          <div class="d-flex justify-content-between pb-2">
            <div class="form-inline pb-4">
              <label class="text-muted mr-3" for="product-sort">Sort by</label>
              <select class="form-control mr-3" id="product-sort">
                <option>Popularuty</option>
                <option>Low - Hight Price</option>
                <option>High - Low Price</option>
                <option>Average Rating</option>
                <option>A - Z Order</option>
                <option>Z - A Order</option>
              </select>
            </div>
           <!--  <div class="form-inline pb-4">
              <label class="text-muted mr-3" for="product-show"><span class='d-none d-sm-inline'>Show&nbsp;</span>products</label>
              <select class="form-control" id="product-show">
                <option>12</option>
                <option>20</option>
                <option>30</option>
                <option>50</option>
                <option>80</option>
                <option>100</option>
              </select>
            </div>-->
          </div>
          <!-- Shop Grid-->
          <div class="row">

            <!-- Product-->
            @foreach($products as $product)
            <div class="col-md-4 col-sm-6 mb-30">
              <div class="product-card mx-auto mb-3">
                <div class="product-head text-right">
                  <div class="rating-stars"><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star active"></i><i class="fe-icon-star"></i><i class="fe-icon-star"></i>
                  </div>
                </div><a class="product-thumb" href="/products/{{$product->slug}}"><img src="{{ asset('assets/img/products/'.$product->slot_image_1) }}" alt="Product Thumbnail"/></a>
                <div class="product-card-body">
                  <a class="product-meta" href="/categories/{{$product->category->slug}}">{{$product->category->title}}</a>
                  <h5 class="product-title">
                    <a href="/products/{{$product->slug}}">{{$product->title}}</a>
                  </h5><span class="product-price">${{formatMoney($product->amount)}}</span>
                </div>
                <div class="product-buttons-wrap">
                  <div class="product-buttons">
                    <div class="product-button"><a href="#" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="Product" data-toast-message="added to your wishlist!"><i class="fe-icon-heart"></i></a></div>
                    <div class="product-button"><a href="#" data-toast data-toast-position="topRight" data-toast-type="info" data-toast-icon="fe-icon-help-circle" data-toast-title="Product" data-toast-message="added to comparison table!"><i class="fe-icon-repeat"></i></a></div>
                    <div class="product-button"><a href="/cart/{{$product->id}}/add?unit=1" data-toast data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Product" data-toast-message="added to cart successfuly!"><i class="fe-icon-shopping-cart"></i></a></div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>

          <div class="pt-3">
            <!-- Pagination-->
            <nav class="pagination"><a class="prev-btn" href="#"><i class="fe-icon-chevron-left"></i>Prev</a>
              <ul class="pages">
                <li class="d-block d-sm-none w-100">2 / 18</li>
                <li class="d-none d-sm-inline-block"><a href="#">1</a></li>
                <li class="d-none d-sm-inline-block active"><a href="#">2</a></li>
                <li class="d-none d-sm-inline-block"><a href="#">3</a></li>
                <li class="d-none d-sm-inline-block"><a href="#">4</a></li>
                <li class="d-none d-sm-inline-block"><a href="#">5</a></li>
                <li class="d-none d-sm-inline-block">...</li>
                <li class="d-none d-sm-inline-block"><a href="#">18</a></li>
              </ul><a class="next-btn" href="#">Next<i class="fe-icon-chevron-right"></i></a>
            </nav>
          </div>
        </div>
      </div>
    </div>
@endsection