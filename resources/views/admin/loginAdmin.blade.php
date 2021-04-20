<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 4 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">

	<title>Sign In - AppStack - Admin &amp; Dashboard Template</title>

	<link rel="preconnect" href="//fonts.gstatic.com/" crossorigin="">
	<link href="{{asset('assets-admin/css/classic.css')}}" rel="stylesheet">

	<!-- PICK ONE OF THE STYLES BELOW -->
	<!-- <link href="css/classic.css" rel="stylesheet"> -->
	<!-- <link href="css/corporate.css" rel="stylesheet"> -->
	<!-- <link href="css/modern.css" rel="stylesheet"> -->

	<!-- BEGIN SETTINGS -->
	<!-- You can remove this after picking a style -->
	<style>
		body {
			opacity: 0;
		} 
	</style>
	<script src="{{asset('assets-admin/js/settings.js')}}"></script>
	<!-- END SETTINGS -->
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-6"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-120946860-6');
	</script>
</head>

<body>
	<main class="main d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row h-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Welcome back, Chris</h1>
							<p class="lead">
								Sign in to your account to continue
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="{{asset('assets-admin/img/avatars/avatar.jpg')}}" alt="Chris Wood" class="img-fluid rounded-circle" width="132" height="132">
									</div>
									<form method="POST" action="{{route('admin.login')}}"> 
										@csrf
										<div class="form-group">
											<label>Email <span class='text-danger font-weight-medium'>*</span></label>
											<input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" autocomplete="email" required>

											@error('email')
						                        <span class="invalid-feedback" role="alert">
						                            <strong>{{ $message }}</strong>
						                        </span>
						                    @enderror

										</div>
										<div class="form-group">
											<label>Password <span class='text-danger font-weight-medium'>*</span></label>
											<input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" class="form-control @error('password') is-invalid @enderror" required>

											@error('password')
						                        <span class="invalid-feedback" role="alert">
						                            <strong>{{ $message }}</strong>
						                        </span>
						                    @enderror

											<small>
									            <a href="pages-reset-password.html">Forgot password?</a>
									         </small>
										</div>
										<div>
											<div class="custom-control custom-checkbox align-items-center">
												<input type="checkbox" class="custom-control-input" value="remember-me" name="remember-me" checked="">
												<label class="custom-control-label text-small">Remember me next time</label>
											</div>
										</div>
										<div class="text-center mt-3">
											<!-- <a href="dashboard-default.html" class="btn btn-lg btn-primary">Sign in</a> -->
											<button type="submit" class="btn btn-lg btn-primary">Sign in</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="{{asset('assets-admin/js/app.js')}}"></script>

</body>

</html>