@extends('layouts.indexLayout')
@section('content')
<!-- Page Title-->
    <div class="page-title d-flex" aria-label="Page title" style="background-image: url({{ asset('assets/img/page-title/shop-pattern.jpg') }});">
      <div class="container text-left align-self-center">
        <h1 class="page-title-heading">Categories</h1>
      </div>
    </div>
    <!-- Page Content-->
    <div class="container pb-4 mb-1">
      <div class="row">
        <!-- Sidebar-->
        <div class="col-lg-3"><a class="offcanvas-toggle" href="#blog-single-sidebar" data-toggle="offcanvas"><i class="fe-icon-sidebar"></i></a>
          <aside class="offcanvas-container" id="blog-single-sidebar">
            <div class="offcanvas-scrollable-area px-4 pt-5 px-lg-0 pt-lg-0"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>
              <div class="widget widget-categories">
                <h4 class="widget-title">Popular brands</h4>
                <ul>
                  @foreach($brands as $brand)
                  <li><a href="#">{{$brand->name}} <span>({{$brand->products->count()}})</span></a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </aside>
        </div>
        <div class="col-lg-9">
          <!-- Promo Banner-->
          @foreach($adsCategories as $adsCategory)
          <a class="alert alert-secondary alert-dismissible fade show mb-30" href="{{$adsCategory->url}}" style="background-image: url({{ asset('assets/img/ads/'.$adsCategory->image) }});">
            <div class="d-flex flex-wrap flex-md-nowrap justify-content-between align-items-center overflow-hidden">
              <div class="mx-auto mx-md-0 px-3 pb-2 text-center text-md-left text-sm-nowrap"><span class="d-block text-lg text-thin mb-2">Limited Time Deals</span>
                <h4 class="text-gray-dark pb-1">Surface Pro 4</h4>
                <div class="countdown countdown-style-1 text-lg mb-1" data-date-time="10/10/2020 12:00" data-labels="{&quot;label-day&quot;: &quot;Days&quot;, &quot;label-hour&quot;: &quot;Hours&quot;, &quot;label-minute&quot;: &quot;Mins&quot;, &quot;label-second&quot;: &quot;Secs&quot;}"></div>
                <p class="d-inline-block bg-gradient text-white px-2 py-1">Shop Now&nbsp;<i class="fe-icon-chevron-right d-inline-block align-middle"></i></p>
              </div><img class="d-block mx-auto mx-md-0" alt="Surface Pro 4" src="{{ asset('assets/img/ads/'.$adsCategory->image) }}">
            </div></a>
            @endforeach
          <!-- Categories Grid-->
          <div class="row pt-3">
            <!-- Category-->
            @foreach($categories as $category)
            <div class="col-sm-6 mb-4">
              <a class="product-category-card mx-auto" href="/categories/{{$category->slug}}">
                <div class="product-category-card-thumb">
                  <div class="main-img"><img src="{{ asset('assets/img/categories/'.$category->image) }}" alt="Shop Category"/>
                  </div>
                </div>
                <div class="product-category-card-body">
                  <div class="product-category-card-meta">Products ( {{$category->products->count()}} )</div>
                  <h5 class="product-category-card-title">{{$category->title}}</h5>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
@endsection