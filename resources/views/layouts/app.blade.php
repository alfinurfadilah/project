<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('themes/metronic-demo9/media/logos/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('themes/metronic-demo9/plugins/custom/leaflet/leaflet.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('themes/metronic-demo9/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('themes/metronic-demo9/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                <!--begin::Logo-->
                <div class="aside-logo flex-column-auto pt-10 pt-lg-20" id="kt_aside_logo">
                    <a href="../../demo9/dist/index.html">
                        <img alt="Logo" src="{{ asset('themes/metronic-demo9/media/logos/logo-demo9.svg') }}"
                            class="h-40px" />
                    </a>
                </div>
                <!--end::Logo-->
                <!--begin::Nav-->
                <div class="aside-menu flex-column-fluid pt-0 pb-5 py-lg-5" id="kt_aside_menu">
                    <!--begin::Aside menu-->
                    <div id="kt_aside_menu_wrapper" class="w-100 hover-scroll-overlay-y scroll-ps d-flex"
                        data-kt-scroll="true" data-kt-scroll-height="auto"
                        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                        data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="0">
                        <div id="kt_aside_menu"
                            class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-400 menu-arrow-gray-400 fw-bold fs-6"
                            data-kt-menu="true">
                            <div class="menu-item py-3">
                                <a class="menu-link {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}"
                                    title="Dashboard" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                    data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen025.svg-->
                                        <span class="svg-icon svg-icon-2x">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect x="2" y="2" width="9" height="9"
                                                    rx="2" fill="black" />
                                                <rect opacity="0.3" x="13" y="2" width="9"
                                                    height="9" rx="2" fill="black" />
                                                <rect opacity="0.3" x="13" y="13" width="9"
                                                    height="9" rx="2" fill="black" />
                                                <rect opacity="0.3" x="2" y="13" width="9"
                                                    height="9" rx="2" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                            </div>

                            <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start"
                                class="menu-item py-3 {{ Route::is('itemCategoryType.index') ? 'here' : '' }} {{ Route::is('itemCategory.index') ? 'here' : '' }} {{ Route::is('itemType.index') ? 'here' : '' }} {{ Route::is('transactionCategory.index') ? 'here' : '' }} {{ Route::is('uom.index') ? 'here' : '' }} {{ Route::is('customer.index') ? 'here' : '' }}">
                                <span class="menu-link" title="Masterdata" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/abstract/abs027.svg-->
                                        <span class="svg-icon svg-icon-muted svg-icon-2x">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M21.25 18.525L13.05 21.825C12.35 22.125 11.65 22.125 10.95 21.825L2.75 18.525C1.75 18.125 1.75 16.725 2.75 16.325L4.04999 15.825L10.25 18.325C10.85 18.525 11.45 18.625 12.05 18.625C12.65 18.625 13.25 18.525 13.85 18.325L20.05 15.825L21.35 16.325C22.35 16.725 22.35 18.125 21.25 18.525ZM13.05 16.425L21.25 13.125C22.25 12.725 22.25 11.325 21.25 10.925L13.05 7.62502C12.35 7.32502 11.65 7.32502 10.95 7.62502L2.75 10.925C1.75 11.325 1.75 12.725 2.75 13.125L10.95 16.425C11.65 16.725 12.45 16.725 13.05 16.425Z"
                                                    fill="black" />
                                                <path
                                                    d="M11.05 11.025L2.84998 7.725C1.84998 7.325 1.84998 5.925 2.84998 5.525L11.05 2.225C11.75 1.925 12.45 1.925 13.15 2.225L21.35 5.525C22.35 5.925 22.35 7.325 21.35 7.725L13.05 11.025C12.45 11.325 11.65 11.325 11.05 11.025Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                                    <div class="menu-item">
                                        <div class="menu-content">
                                            <span class="menu-section fs-5 fw-bolder ps-1 py-1">Masterdata</span>
                                        </div>
                                    </div>
                                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                        <span
                                            class="menu-link {{ Route::is('itemCategoryType.index') ? 'active' : '' }} {{ Route::is('itemCategory.index') ? 'active' : '' }} {{ Route::is('itemType.index') ? 'active' : '' }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Manajemen Kategori</span>
                                            <span class="menu-arrow"></span>
                                        </span>
                                        <div class="menu-sub menu-sub-accordion">
                                            {{-- <div class="menu-item">
                                                <a class="menu-link {{ Route::is('itemCategoryType.index') ? 'active' : '' }}" href="{{ route('itemCategoryType.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Jenis Kategori</span>
                                                </a>
                                            </div> --}}
                                            <div class="menu-item">
                                                <a class="menu-link {{ Route::is('itemCategory.index') ? 'active' : '' }}"
                                                    href="{{ route('itemCategory.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kategori</span>
                                                </a>
                                            </div>
                                            <div class="menu-item">
                                                <a class="menu-link {{ Route::is('itemType.index') ? 'active' : '' }}"
                                                    href="{{ route('itemType.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Jenis Barang</span>
                                                </a>
                                            </div>
                                            {{-- <div class="menu-item">
                                               <a class="menu-link {{ Route::is('transactionCategory.index') ? 'active' : '' }}" href="{{ route('transactionCategory.index') }}">
                                                    <span class="menu-bullet">
                                                        <span class="bullet bullet-dot"></span>
                                                    </span>
                                                    <span class="menu-title">Kategori Transaksi</span>
                                                </a>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Route::is('uom.index') ? 'active' : '' }}"
                                            href="{{ route('uom.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Unit Of Measure</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Route::is('customer.index') ? 'active' : '' }}"
                                            href="{{ route('customer.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Customer</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Route::is('supplier.index') ? 'active' : '' }}"
                                            href="{{ route('supplier.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Supplier</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start"
                                class="menu-item py-3 {{ Route::is('item.index') ? 'here' : '' }} {{ Route::is('itemHistory.index') ? 'here' : '' }}">
                                <span class="menu-link" title="Manajemen Items" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm009.svg-->
                                        <span class="svg-icon svg-icon-muted svg-icon-2x">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z"
                                                    fill="black" />
                                                <path d="M7 16H6C5.4 16 5 15.6 5 15V13H8V15C8 15.6 7.6 16 7 16Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z"
                                                    fill="black" />
                                                <path
                                                    d="M18 16H17C16.4 16 16 15.6 16 15V13H19V15C19 15.6 18.6 16 18 16Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z"
                                                    fill="black" />
                                                <path d="M7 5H6C5.4 5 5 4.6 5 4V2H8V4C8 4.6 7.6 5 7 5Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z"
                                                    fill="black" />
                                                <path d="M18 5H17C16.4 5 16 4.6 16 4V2H19V4C19 4.6 18.6 5 18 5Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                                    <div class="menu-item">
                                        <div class="menu-content">
                                            <span class="menu-section fs-5 fw-bolder ps-1 py-1">Manajemen Items</span>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Route::is('item.index') ? 'active' : '' }}"
                                            href="{{ route('item.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Stock Items</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Route::is('itemHistory.index') ? 'active' : '' }}"
                                            href="{{ route('itemHistory.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">History Stock Items</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start"
                                class="menu-item py-3 {{ Route::is('transactionItem.index') ? 'here' : '' }}">
                                <span class="menu-link" title="Manajemen Transaksi" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm004.svg-->
                                        <span class="svg-icon svg-icon-muted svg-icon-2hx">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M18 10V20C18 20.6 18.4 21 19 21C19.6 21 20 20.6 20 20V10H18Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M11 10V17H6V10H4V20C4 20.6 4.4 21 5 21H12C12.6 21 13 20.6 13 20V10H11Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M10 10C10 11.1 9.1 12 8 12C6.9 12 6 11.1 6 10H10Z"
                                                    fill="black" />
                                                <path opacity="0.3"
                                                    d="M18 10C18 11.1 17.1 12 16 12C14.9 12 14 11.1 14 10H18Z"
                                                    fill="black" />
                                                <path opacity="0.3" d="M14 4H10V10H14V4Z" fill="black" />
                                                <path opacity="0.3" d="M17 4H20L22 10H18L17 4Z" fill="black" />
                                                <path opacity="0.3" d="M7 4H4L2 10H6L7 4Z" fill="black" />
                                                <path
                                                    d="M6 10C6 11.1 5.1 12 4 12C2.9 12 2 11.1 2 10H6ZM10 10C10 11.1 10.9 12 12 12C13.1 12 14 11.1 14 10H10ZM18 10C18 11.1 18.9 12 20 12C21.1 12 22 11.1 22 10H18ZM19 2H5C4.4 2 4 2.4 4 3V4H20V3C20 2.4 19.6 2 19 2ZM12 17C12 16.4 11.6 16 11 16H6C5.4 16 5 16.4 5 17C5 17.6 5.4 18 6 18H11C11.6 18 12 17.6 12 17Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                                    <div class="menu-item">
                                        <div class="menu-content">
                                            <span class="menu-section fs-5 fw-bolder ps-1 py-1">Manajemen
                                                Transaksi</span>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link {{ Route::is('transactionItem.index') ? 'active' : '' }}"
                                            href="{{ route('transactionItem.index') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Transaksi</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">History Transaksi</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            {{-- <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start" class="menu-item py-3 {{ Route::is('laporan.pemasukan') ? 'here' : '' }} {{ Route::is('laporan.pengeluaran') ? 'here' : '' }} {{ Route::is('laporan.persediaan') ? 'here' : '' }} {{ Route::is('laporan.labaRugi') ? 'here' : '' }}  "> --}}
                            <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start"
                                class="menu-item py-3">
                                <span class="menu-link" title="Reporting" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/graphs/gra001.svg-->
                                        <span class="svg-icon svg-icon-muted svg-icon-2x">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3"
                                                    d="M14 3V21H10V3C10 2.4 10.4 2 11 2H13C13.6 2 14 2.4 14 3ZM7 14H5C4.4 14 4 14.4 4 15V21H8V15C8 14.4 7.6 14 7 14Z"
                                                    fill="black" />
                                                <path
                                                    d="M21 20H20V8C20 7.4 19.6 7 19 7H17C16.4 7 16 7.4 16 8V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                                    <div class="menu-item">
                                        <div class="menu-content">
                                            <span class="menu-section fs-5 fw-bolder ps-1 py-1">Laporan</span>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        {{-- <a class="menu-link {{ Route::is('product.index') ? 'active' : '' }}" href="{{route('laporan.pemasukan')}}"> --}}
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Laporan Pemasukan</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        {{-- <a class="menu-link {{ Route::is('products.category') ? 'active' : '' }}" href="{{route('products.category')}}"> --}}
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Laporan Pengeluaran</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        {{-- <a class="menu-link {{ Route::is('products.category') ? 'active' : '' }}" href="{{route('products.category')}}"> --}}
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Laporan Transaksi Stock</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div data-kt-menu-trigger="click" data-kt-menu-placement="right-start"
                                class="menu-item py-3">
                                <span class="menu-link" title="User Management" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                    <span class="menu-icon">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com014.svg-->
                                        <span class="svg-icon svg-icon-muted svg-icon-2x">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                                    fill="black" />
                                                <rect opacity="0.3" x="14" y="4" width="4"
                                                    height="4" rx="2" fill="black" />
                                                <path
                                                    d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                                    fill="black" />
                                                <rect opacity="0.3" x="6" y="5" width="6"
                                                    height="6" rx="3" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                <div class="menu-sub menu-sub-dropdown w-225px px-1 py-4">
                                    <div class="menu-item">
                                        <div class="menu-content">
                                            <span class="menu-section fs-5 fw-bolder ps-1 py-1">User Management</span>
                                        </div>
                                    </div>
                                    <div class="menu-item">
                                        {{-- <a class="menu-link {{ Route::is('product.index') ? 'active' : '' }}" href="{{route('laporan.pemasukan')}}"> --}}
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Users</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        {{-- <a class="menu-link {{ Route::is('products.category') ? 'active' : '' }}" href="{{route('products.category')}}"> --}}
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Menu Management</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        {{-- <a class="menu-link {{ Route::is('products.category') ? 'active' : '' }}" href="{{route('products.category')}}"> --}}
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Role Management</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Aside menu-->
                </div>
                <!--end::Nav-->
                <!--begin::Footer-->
                <div class="aside-footer flex-column-auto pb-5 pb-lg-10" id="kt_aside_footer">
                    <!--begin::Menu-->
                    <div class="d-flex flex-center w-100 scroll-px" data-bs-toggle="tooltip"
                        data-bs-placement="right" data-bs-dismiss="click" title="Sign Out">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="btn btn-custom" data-kt-menu-trigger="click" data-kt-menu-overflow="true"
                            data-kt-menu-placement="top-start">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
                            <span class="svg-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" width="12" height="2" rx="1"
                                        transform="matrix(-1 0 0 1 15.5 11)" fill="black" />
                                    <path
                                        d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
                                        fill="black" />
                                    <path
                                        d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                        fill="#C4C4C4" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header tablet and mobile-->
                <div class="header-mobile py-3">
                    <!--begin::Container-->
                    <div class="container d-flex flex-stack">
                        <!--begin::Mobile logo-->
                        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                            <a href="../../demo9/dist/index.html">
                                <img alt="Logo" src="assets/media/logos/logo-demo9.svg" class="h-35px" />
                            </a>
                        </div>
                        <!--end::Mobile logo-->
                        <!--begin::Aside toggle-->
                        <button class="btn btn-icon btn-active-color-primary" id="kt_aside_toggle">
                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                            <span class="svg-icon svg-icon-2x me-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </button>
                        <!--end::Aside toggle-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header tablet and mobile-->
                <!--begin::Header-->
                <div id="kt_header" class="header py-6 py-lg-0" data-kt-sticky="true" data-kt-sticky-name="header"
                    data-kt-sticky-offset="{lg: '300px'}">
                    <!--begin::Container-->
                    <div class="header-container container-xxl">
                        <!--begin::Page title-->
                        <div
                            class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 py-3 py-lg-0 me-3">
                            <!--begin::Heading-->
                            <h1 class="d-flex flex-column text-dark fw-bolder my-1">
                                <span class="text-white fs-1">{{ $breadcumb ?? '' }}</span>
                                <small class="text-gray-600 fs-6 fw-normal pt-2">Create a store with #YDR-124-346
                                    code</small>
                            </h1>
                            <!--end::Heading-->
                        </div>
                        <!--end::Page title=-->
                        <!--begin::Wrapper-->
                        <div class="d-flex align-items-center flex-wrap">
                            <!--begin::Action-->
                            <div class="d-flex align-items-center py-3 py-lg-0">
                                <div class="me-3">
                                    <a href="#" class="btn btn-icon btn-custom btn-active-color-primary"
                                        data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                        data-kt-menu-placement="bottom-end">
                                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                                        <span class="svg-icon svg-icon-1 svg-icon-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                    fill="black" />
                                                <rect opacity="0.3" x="8" y="3" width="8"
                                                    height="8" rx="4" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--begin::Menu-->
                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                        data-kt-menu="true">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content d-flex align-items-center px-3">
                                                <!--begin::Avatar-->
                                                <div class="symbol symbol-50px me-5">
                                                    <img alt="Logo"
                                                        src="{{ asset('themes/metronic-demo9/media/avatars/150-26.jpg') }}" />
                                                </div>
                                                <!--end::Avatar-->
                                                <!--begin::Username-->
                                                <div class="d-flex flex-column">
                                                    <div class="fw-bolder d-flex align-items-center fs-5">Max Smith
                                                        <span
                                                            class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
                                                    </div>
                                                    <a href="#"
                                                        class="fw-bold text-muted text-hover-primary fs-7">max@kt.com</a>
                                                </div>
                                                <!--end::Username-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a href="../../demo9/dist/account/overview.html" class="menu-link px-5">My
                                                Profile</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5 my-1">
                                            <a href="../../demo9/dist/account/settings.html"
                                                class="menu-link px-5">Account Settings</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-5">
                                            <a class="menu-link px-5" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('Sign Out') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                            </div>
                            <!--end::Action-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Container-->
                    <div class="header-offset"></div>
                </div>
                <!--end::Header-->

                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div class="container-xxl" id="kt_content_container">
                        @yield('content')
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Content-->

                <!--begin::Footer-->
                <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container-xxl d-flex flex-column flex-md-row flex-stack">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-gray-400 fw-bold me-1">Created by</span>
                            <a href="https://keenthemes.com" target="_blank"
                                class="text-muted text-hover-primary fw-bold me-2 fs-6">Keenthemes</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-bold order-1">
                            <li class="menu-item">
                                <a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://keenthemes.com/support" target="_blank"
                                    class="menu-link px-2">Support</a>
                            </li>
                            <li class="menu-item">
                                <a href="https://1.envato.market/EA4JP" target="_blank"
                                    class="menu-link px-2">Purchase</a>
                            </li>
                        </ul>
                        <!--end::Menu-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--end::Main-->

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('themes/metronic-demo9/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('themes/metronic-demo9/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    @yield('onpage-js')
    <!--end::Page Vendors Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
