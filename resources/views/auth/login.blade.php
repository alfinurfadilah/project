<html lang="en">
    <!--begin::Head-->
    <head>
        <base href="../../../">
        <title>Loccana POS</title>
        <meta charset="utf-8" />
        <!--begin::Fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!--end::Fonts-->
        <!--begin::Global Stylesheets Bundle(used by all pages)-->
        <link href="{{ asset('themes/metronic-demo9/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('themes/metronic-demo9/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <!--end::Global Stylesheets Bundle-->
    </head>
    <!--end::Head-->
    
    <!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->

		<div class="d-flex flex-row flex-column-fluid">
			<div class="d-flex flex-row-auto w-lg-500px w-sm-25 bg-dark flex-center">
				<div class="d-flex flex-column flex-row-auto w-100 h-100">
					<div class="d-flex flex-column h-50 w-100 bg-dark flex-center">
						<!--begin::Heading-->
						<div class="text-center mb-5">
							<img alt="Logo" src="{{ asset('img/logo-new-light.png') }}" class="mb-10"/>
							<!--begin::Title-->
							<h4 class="text-light mb-3 fs-3">Selamat Datang <br> di Loccana Point Of Sale</h4>
							<!--end::Title-->
						</div>
						<!--begin::Heading-->
					</div>
			
					<div class="d-flex flex-column-fluid bg-dark flex-center">
						<img alt="Logo" src="{{ asset('themes/metronic-demo9/media/illustrations/sketchy-1/15-dark.png') }}" class="h-400px"/>
					</div>
				</div>
			</div>
			<div class="d-flex flex-row-fluid bg-body flex-center">
				<div class="d-flex flex-column flex-row-fluid h-100 w-75 bg-body rounded shadow-sm p-10 p-lg-15 mx-auto flex-center">
					<div class="d-flex flex-column-fluid h-100 w-350px">
						<!--begin::Form-->
						<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" method="POST" action="{{ route('login') }}">
							@csrf
							<!--begin::Heading-->
							<div class="text-center mb-5">
								<img alt="Logo" src="{{ asset('img/logo-new.png') }}" class="mb-10"/>
								<!--begin::Title-->
								<h4 class="text-dark mb-3">Sign In to Loccana Point Of Sale</h4>
								<!--end::Title-->
								<!--begin::Link-->
								<div class="text-gray-400 fw-bold fs-7">New Here?
								<a href="#" class="link-success fw-bolder">Create an Account</a></div>
								<!--end::Link-->
							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fs-6 fw-bolder text-dark">{{ __('Email Address') }}</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input id="email" type="email" name="email" class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack mb-2">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
									<!--end::Label-->
									<!--begin::Link-->
									@if (Route::has('password.request'))
										<a class="link-success fs-7 fw-bolder" href="{{ route('password.request') }}">
											{{ __('Forgot Password ?') }}
										</a>
									@endif
									<!--end::Link-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Input-->
								<input id="password" type="password" name="password" class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" required autocomplete="current-password">
								
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								<!--end::Input-->
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" class="btn btn-lg btn-success w-100 mb-5">
                                    {{ __('Masuk') }}
                                </button>
								<!--end::Submit button-->
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<div class="d-flex flex-column-auto flex-center w-100 h-50px">
						<ul class="menu menu-gray-400 menu-hover-primary fw-bold order-1">
							<li class="menu-item">
								<a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
							</li>
							<li class="menu-item">
								<a href="https://keenthemes.com/support" target="_blank" class="menu-link px-2">Support</a>
							</li>
							<li class="menu-item">
								<a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!--end::Main-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
        <script src="{{ asset('themes/metronic-demo9/plugins/global/plugins.bundle.js') }}"></script>
        <script src="{{ asset('themes/metronic-demo9/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="{{ asset('themes/metronic-demo9/js/custom/authentication/sign-in/general.js') }}"></script>
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->

</html>