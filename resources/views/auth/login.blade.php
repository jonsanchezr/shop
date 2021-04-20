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

    <div class="container mb-3">
        <div class="row">
            <div class="card-header">{{ __('Login') }}</div>
            <div class="col-md-6 pb-5">
              <form class="needs-validation wizard" novalidate method="POST" action="{{ route('login') }}">
                @csrf
                <div class="wizard-body pt-2">
                  <div class="d-sm-flex justify-content-between pb-2">
                    <a class="btn btn-secondary btn-sm btn-block my-2 mr-3" href="#">
                        <i class="socicon-facebook"></i>&nbsp;Login
                    </a>
                    <a class="btn btn-secondary btn-sm btn-block my-2 mr-3" href="#">
                        <i class="socicon-twitter"></i>&nbsp;Login
                    </a>
                    <a class="btn btn-secondary btn-sm btn-block my-2 mr-3" href="#">
                        <i class="socicon-linkedin"></i>&nbsp;Login
                    </a>
                </div>
                <div>
                  <hr>
                  <h3 class="h5 pt-4 pb-2">Or using form below</h3>
                  <div class="input-group form-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fe-icon-mail"></i>
                        </span>
                    </div>
                    <input class="form-control" id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="invalid-feedback">Please enter your email!</div>
                </div>
                <div class="input-group form-group">
                    <div class="input-group-prepend"><span class="input-group-text"><i class="fe-icon-lock"></i></span></div>
                    <input class="form-control" id="password" type="password" name="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" autocomplete="current-password" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <div class="invalid-feedback">Please enter valid password!</div>
                  </div>
                  <div class="d-flex flex-wrap justify-content-between">
                    <div class="custom-control custom-checkbox">

                      <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
                
                      <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>

                    </div><a class="navi-link" href="account-password-recovery.html">Forgot password?</a>
                  </div>
                </div>
                <div class="wizard-footer text-right">

                  <button class="btn btn-primary" type="submit">{{ __('Login') }}</button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif

                </div>
              </form>
            </div>
        </div>
    </div>
    <div class="site-backdrop"></div>
    <!-- JavaScript (jQuery) libraries, plugins and custom scripts-->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>
  </body>
</html>

