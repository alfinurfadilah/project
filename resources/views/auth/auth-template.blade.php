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
                        <img alt="Logo" src="{{ asset('img/logo-new-light.png') }}" class="mb-10" />
                        <!--begin::Title-->
                        <h4 class="text-light mb-3 fs-3">Selamat Datang <br> di Loccana Point Of Sale</h4>
                        <!--end::Title-->
                    </div>
                    <!--begin::Heading-->
                </div>

                <div class="d-flex flex-column-fluid bg-dark flex-center">
                    <img alt="Logo"
                        src="{{ asset('themes/metronic-demo9/media/illustrations/sketchy-1/15-dark.png') }}"
                        class="h-400px" />
                </div>
            </div>
        </div>
        @yield('content')
    </div>

    <!--end::Main-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('themes/metronic-demo9/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('themes/metronic-demo9/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('themes/metronic-demo9/js/custom/authentication/sign-in/general.js') }}"></script>
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
    @yield('onpage-js')
</body>
<!--end::Body-->

</html>
