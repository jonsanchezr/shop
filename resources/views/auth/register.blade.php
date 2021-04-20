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
    <link rel="icon" type="{{ asset('assets/image/png') }}" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="{{ asset('assets/image/png') }}" sizes="16x16" href="favicon-16x16.png">
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
  <body>
    <div class="container mb-3">
      <div class="col-md-6 pb-5">
        <h3 class="h4 pb-1">No Account? Register</h3>
        <p>Registration takes less than a minute but gives you full control over your orders.</p>
          <form class="needs-validation" method="POST" action="{{ route('register') }}" novalidate>
              @csrf
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="reg-fn" for="name" id="name" >{{ __('UserName*') }}</label>
                    <input class="form-control" type="text" required id="reg-fn" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="invalid-feedback">Please enter your first name!</div>
                      <div class="form-group row">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="email">{{ __('E-Mail Address*') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" required id="reg-email">
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    <div class="invalid-feedback">Please enter valid email address!</div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>
                    <input class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" type="password" required id="password">
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    <div class="invalid-feedback">Please enter password!</div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" >
                    <div class="invalid-feedback">Passwords do not match!</div>
                  </div>
                </div>
              </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-fn">{{__('First Name*') }}</label>
                      <input class="form-control" type="text" id="checkout-fn" name="first_name" required="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label class="text-muted" for="checkout-ln">{{__('Last Name*') }}</label>
                      <input class="form-control" type="text" id="checkout-ln" name="last_name" required="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-muted" for="checkout-phone">{{__('Phone Number*') }}</label>
                    <input class="form-control" type="text" id="checkout-phone" name="phone" required="">     
                  </div>
                </div>            
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-muted" for="checkout-company">{{__('Company') }}</label>
                    <input class="form-control" type="text" id="checkout-company" name="company">
                  </div>
                </div>
              </div>  
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-muted" for="checkout-country">{{__('Country*') }}</label>
                    <select class="form-control" id="checkout-country" name="country" required="">
                      <option>Choose country</option>
                      <option>Australia</option>
                      <option>Canada</option>
                      <option>France</option>
                      <option>Germany</option>
                      <option>Switzerland</option>
                      <option>USA</option>
                    </select>
                  </div>
                </div>          
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-muted" for="checkout-city">{{__('City') }}</label>
                    <input type="text" class="form-control" id="checkout-city" name="city">
                  </div>
                </div>
              </div>  
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-muted" for="checkout-zip">{{__('Code Postal') }}</label>
                    <input class="form-control" type="text" id="checkout-zip" name="code_postal" >
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-muted" for="checkout-address-1">{{__('Address 1*') }}</label>
                    <input class="form-control" type="text" id="checkout-address-1" name="address_1" required="">
                  </div>
                </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-muted" for="checkout-address-1">{{__('Identity 1*') }}</label>
                    <input class="form-control" type="text" id="checkout-address-1" name="identity" required="">
                  </div>
                </div>
              </div>

                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="text-muted" for="checkout-address-2">{{__('Address 2') }}</label>
                    <input class="form-control" type="text" id="checkout-address-2" name="address_2">
                  </div>
                </div>
              
              <div class="text-right">
                <button class="btn btn-primary" type="submit">{{ __('Register') }}</button>
              </div>
          </form>
      </div>
    </div>
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
  </body>
</html>