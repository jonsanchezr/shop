<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>E-COMMERCE
    </title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="CreateX - Multipurpose Bootstrap Theme">
    <meta name="keywords" content="multipurpose, portfolio, blog, shop, e-commerce, modern, flat style, responsive,  business, corporate, mobile, bootstrap 4, html5, css3, jquery, js, gallery, slider, touch, creative, clean">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="{{ asset('favicon-32x32.png') }}" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="{{ asset('favicon-16x16.png') }}" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#343b43" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#603cba">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles including: Font Icons, Plugins, etc.-->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/css/vendor.min.css') }}">
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/css/theme.min.css') }}">
    <!-- Modernizr-->
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
  </head>
  <!-- Body-->
  <body>
    <!-- Off-Canvas Menu-->
    <div class="offcanvas-container is-triggered offcanvas-container-reverse" id="mobile-menu"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>
      <div class="px-4 pb-4">
        <h6>Menu</h6>
        <div class="d-flex justify-content-between pt-2">
          <!--<div class="btn-group w-100 mr-2">
            <a class="btn btn-secondary btn-sm btn-block dropdown-toggle" href="#" data-toggle="dropdown">
              <img src="{{ asset('assets/img/flags/en.png') }}" alt="English"/>English</a>
            <div class="dropdown-menu" style="min-width: 150px;">
              <a class="dropdown-item" href="#">
                <img src="{{ asset('assets/img/flags/fr.png') }}" alt="Français"/>Français</a>
              <a class="dropdown-item" href="#">
                <img src="{{ asset('assets/img/flags/de.png') }}" alt="Deutsch"/>Deutsch</a>
              <a class="dropdown-item" href="#">
                <img src="{{ asset('assets/img/flags/it.png') }}" alt="Italiano"/>Italiano</a>
            </div>
          </div>-->
          <a class="btn btn-primary btn-sm btn-block" href="account-login.html"><i class="fe-icon-user"></i>&nbsp;Login</a>
        </div>
      </div>
      <div class="offcanvas-scrollable-area border-top" style="height:calc(100% - 235px); top: 144px;">
        <!-- Mobile Menu-->
        <div class="accordion mobile-menu" id="accordion-menu">
          <!-- Portfolio-->
          @foreach($settingTopmenus as $topmenu)
          <div class="card" >
            <div class="card-header"><a class="mobile-menu-link" href="{{$topmenu->url}}">{{$topmenu->title}}</a></div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="offcanvas-footer px-4 pt-3 pb-2 text-center"><a class="social-btn sb-style-3 sb-twitter" href="#"><i class="socicon-twitter"></i></a><a class="social-btn sb-style-3 sb-facebook" href="#"><i class="socicon-facebook"></i></a><a class="social-btn sb-style-3 sb-pinterest" href="#"><i class="socicon-pinterest"></i></a><a class="social-btn sb-style-3 sb-instagram" href="#"><i class="socicon-instagram"></i></a></div>
    </div>
    <!-- Off-Canvas Shopping Cart-->
    <div class="offcanvas-container is-triggered offcanvas-container-reverse" id="shopping-cart"><span class="offcanvas-close"><i class="fe-icon-x"></i></span>
      <div class="px-4">
        <h6>Your Cart</h6>
        @if(count($cart) > 0)
          <div class="widget widget-cart pt-2">

          @foreach(Session::get('products') as $p)
            @foreach($cart as $productCart)

            @if($p['id'] == $productCart->id)
              <a class="featured-product" href="/products/{{$productCart->slug}}">
                <div class="featured-product-thumb">

                  <img src="{{ asset('assets/img/products/'.$productCart->slot_image_1) }}" alt="Product Image"/>
                </div>
                <div class="featured-product-info">                 
                  <h5 class="featured-product-title">{{$productCart->title}}</h5>
                  <span class="featured-product-price">{{$p['unit']}}x ${{formatMoney($productCart->amount)}}</span>
                  <span class="remove-product" onclick="event.preventDefault(); deleteCart({{$productCart->id}})"><i class="fe-icon-x"></i>
                  </span>
                </div>
              </a>
              @endif

            @endforeach
          @endforeach



            <hr class="mt-3 mb-3">
            <span class="text-sm text-muted">Subtotal:&nbsp;</span>
            <strong>${{$subTotalCart}}</strong>       
            <div class="d-flex justify-content-between pt-3">
              <a class="btn btn-primary btn-block btn-sm mr-2" href="{{ route('cart.index') }}">View Cart</a>
              <a class="btn btn-accent btn-block mt-0 btn-sm" href="{{ route('checkout.checkoutStep_1') }}">
                Checkout
              </a>
            </div>
          </div>
        @else
          <br><br><br>
          <div class="text-center"><h3>No <br> Tiene Ningun <br> Producto</h3></div>
        @endif          
      </div>
    </div>
    <!-- Navbar: Default-->
    <!-- Remove "navbar-sticky" class to make navigation bar scrollable with the page.-->
    <header class="navbar-wrapper navbar-sticky">
      <div class="d-table-cell align-middle pr-md-3">
        <a class="navbar-brand mr-1" href="/">
          <img src="{{ asset('assets/img/profiles/'.$profileCompany->logo) }}" alt="CreateX"/>
        </a>
      </div>
      <div class="d-table-cell w-100 align-middle pl-md-3">
        <div class="navbar-top d-none d-lg-flex justify-content-between align-items-center">
          <div>
            <a class="navbar-link mr-3" href="{{$profileCompany->phone_mobile}}">
              <i class="fe-icon-phone"></i>{{$profileCompany->phone_mobile}}
            </a>
            <a class="navbar-link mr-3" href="{{$profileCompany->email}}">
              <i class="fe-icon-mail"></i>{{$profileCompany->email}}
            </a>
            <a class="social-btn sb-style-3 sb-twitter" href="#"><i class="socicon-twitter"></i>
            </a>
            <a class="social-btn sb-style-3 sb-facebook" href="#"><i class="socicon-facebook"></i>
            </a>
            <a class="social-btn sb-style-3 sb-pinterest" href="#"><i class="socicon-pinterest"></i>
            </a>
            <a class="social-btn sb-style-3 sb-instagram" href="#"><i class="socicon-instagram"></i>
            </a>
          </div>
          <div>
            <ul class="list-inline mb-0">
              
              @guest
              <li class="dropdown-toggle mr-2">
                <a class="navbar-link" href="{{ route('login') }}">
                  <i class="fe-icon-user"></i>Login or Create account
                </a>
                <div class="dropdown-menu right-aligned p-3 text-center" style="min-width: 200px;">
                  <p class="text-sm opacity-70">Sign in to your account or register new one to have full control over your orders, receive bonuses and more.</p>
                  <a class="btn btn-primary btn-sm btn-block" href="{{ route('login') }}">Sign In</a>
                  <p class="text-sm text-muted mt-3 mb-0">New customer? 
                    <a href="{{ route('register') }}">Register</a>
                  </p>
                </div>
              </li>
              @else
              <li class="dropdown-toggle mr-2">
                <a class="navbar-link" href="{{ route('login') }}">
                  <i class="fe-icon-user"></i>{{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu right-aligned p-3 text-center" style="min-width: 200px;">
                  <a class="btn btn-primary btn-sm btn-block" href="{{ route('users.profile') }}" style="background-color: #fff;color: #353535;border: solid 1px #353535;">Profile
                  </a>
                  <a class="btn btn-primary btn-sm btn-block" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
              </li>
              @endguest
              
             <!-- <li class="dropdown-toggle">
                <a class="navbar-link" href="#"><img src="{{ asset('assets/img/flags/en.png') }}" alt="English"/>Eng / Usd</a>
                <div class="dropdown-menu lang-dropdown right-aligned">
                  <div class="p-3">
                    <select class="form-control">
                      <option value="usd">$ USD</option>
                      <option value="eur">€ EUR</option>
                      <option value="ukp">£ UKP</option>
                      <option value="jpy">¥ JPY</option>
                    </select>
                  </div><a class="dropdown-item" href="#"><img src="{{ asset('assets/img/flags/fr.png') }}" alt="Français"/>Français</a><a class="dropdown-item" href="#"><img src="{{ asset('assets/img/flags/de.png') }}" alt="Deutsch"/>Deutsch</a><a class="dropdown-item" href="#"><img src="{{ asset('assets/img/flags/it.png') }}" alt="Italiano"/>Italiano</a>
                </div>
              </li>-->

            </ul>
          </div>
        </div>
        <div class="navbar justify-content-end justify-content-lg-between">
          <!-- Search-->
          <form class="search-box" method="get">
            <input type="text" id="site-search" placeholder="Type A or C to see suggestions"><span class="search-close"><i class="fe-icon-x"></i></span>
          </form>
          <!-- Main Menu-->
          <ul class="navbar-nav d-none d-lg-block">  
            <!-- Portfolio-->
            @foreach($settingTopmenus as $topmenu)
            <li class="nav-item dropdown-toggle 
            @if($topmenu->url == $activeTopMenu)
              active
            @endif
            "><a class="nav-link" href="/{{$topmenu->url}}">{{$topmenu->title}}</a>
            </li>
            @endforeach
            
          </ul>
          <div>
            <ul class="navbar-buttons d-inline-block align-middle mr-lg-2">
              <li class="d-block d-lg-none"><a href="#mobile-menu" data-toggle="offcanvas"><i class="fe-icon-menu"></i></a></li>
              <li><a href="#" data-toggle="search"><i class="fe-icon-search"></i></a></li>
              
              <li>
                <a href="#shopping-cart" data-toggle="offcanvas">
                  <i class="fe-icon-shopping-cart"></i>
                </a>
                @if($cart->count() > 0)
                <span class="badge badge-danger">{{ $cart->count() }}</span>
                @endif
              </li>

            </ul>
          </div>
        </div>
      </div>
    </header>
    <!-- Page Content-->
    
    @yield('content')

    <!-- Footer-->
    <footer class="bg-dark pt-5">
      <!-- Second Row-->
      <div class="pt-5" style="background-color: #30363d;">
        <div class="container">
          <div class="row">
            <!-- Contacts-->
            <div class="col-lg-3 col-sm-6">
              <div class="widget widget-contacts widget-light-skin mb-4">
                <h4 class="widget-title">Get in touch with us</h4>
                <ul>
                  <li><i class="fe-icon-map-pin"></i><span>Find us</span><a href="{{$profileCompany->country}}">{{$profileCompany->country}}</a></li>
                  <li><i class="fe-icon-phone"></i><span>Call us</span><a href="{{$profileCompany->phone_local}}">{{$profileCompany->phone_local}}</a></li>
                  <li><i class="fe-icon-mail"></i><span>Write us</span><a href="{{$profileCompany->email}}">{{$profileCompany->email}}</a></li>
                </ul>
              </div>
              <div class="widget pt-2"><a class="social-btn sb-style-6 sb-facebook sb-light-skin" href="#"><i class="socicon-facebook"></i></a><a class="social-btn sb-style-6 sb-twitter sb-light-skin" href="#"><i class="socicon-twitter"></i></a><a class="social-btn sb-style-6 sb-youtube sb-light-skin" href="#"><i class="socicon-youtube"></i></a><a class="social-btn sb-style-6 sb-instagram sb-light-skin" href="#"><i class="socicon-instagram"></i></a><a class="social-btn sb-style-6 sb-pinterest sb-light-skin" href="#"><i class="socicon-pinterest"></i></a></div>
            </div>
            <!-- Mobile App-->
            <div class="col-lg-3 col-sm-6">
              <div class="widget widget-light-skin">
                <h4 class="widget-title">Our mobile app</h4><a class="market-btn apple-btn market-btn-light-skin mr-3 mb-3" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">App Store</span></a><a class="market-btn google-btn market-btn-light-skin mr-3 mb-3" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Google Play</span></a><a class="market-btn windows-btn market-btn-light-skin mr-3 mb-3" href="#"><span class="mb-subtitle">Download on the</span><span class="mb-title">Windows Store</span></a><a class="market-btn amazon-btn market-btn-light-skin mr-3 mb-3" href="#"><span class="mb-subtitle">Order now at</span><span class="mb-title">Amazon.com</span></a>
              </div>
            </div>
            <!-- Subscription-->
            <div class="col-lg-6">
              <div class="widget widget-light-skin">
                <h4 class="widget-title">Be informed</h4>
                <form action="https://studio.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=29ca296126" method="post" target="_blank" novalidate>
                  <div class="input-group">
                    <input class="form-control form-control-light-skin" type="email" name="EMAIL" placeholder="Email address">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="submit">Sign Up</button>
                    </div>
                  </div><small class="form-text text-white opacity-50 pt-1">Subscribe to our Newsletter to receive early discount offers, latest news, sales and promo information.</small>
                  <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                  <div style="position: absolute; left: -5000px;" aria-hidden="true">
                    <input type="text" name="b_c7103e2c981361a6639545bd5_1194bb7544" tabindex="-1">
                  </div>
                </form>
                <div class="pt-4 mt-2"><img class="d-block" src="{{ asset('assets/img/credit-cards-footer.png') }}" style="width: 324px;" alt="Credit Cards"></div>
              </div>
              <!-- Account Links-->
              <div class="col-lg-10 col-sm-20">
                <div class="widget widget-categories widget-light-skin">
                  <ul>
                    <li><a href="/users/profile">My Profile</a></li>
                    <li><a href="#">Shipping Rates &amp; Policies</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <hr class="hr-light">
          <div class="d-md-flex justify-content-between align-items-center py-4 text-center text-md-left">
            <div class="order-2"><a class="footer-link text-white" href="#">About</a><a class="footer-link text-white ml-3" href="#">Help &amp; Info</a><a class="footer-link text-white ml-3" href="#">Privacy Policy</a></div>
            <p class="m-0 text-sm text-white order-1"><span class='opacity-60'>© All rights reserved. Made with</span> <i class='d-inline-block align-middle fe-icon-heart text-danger'></i> <a href='http://estudio2b.dev/' class='d-inline-block nav-link text-white opacity-60 p-0' target='_blank'>by Estudio2B</a></p>
          </div>
        </div>
      </div>
    </footer>
    <!-- Back To Top Button--><a class="scroll-to-top-btn" href="#"><i class="fe-icon-chevron-up"></i></a>
    <!-- Backdrop-->
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
    <script type="text/javascript">
      function deleteCart(id) {
        window.location.replace('/cart/'+id+'/delete')
      }
    </script>
  </body>
</html>