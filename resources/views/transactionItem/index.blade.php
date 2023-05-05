@extends('layouts.app')

@section('content')
    <div class="container-fluid" id="divContainerTransaksi">
        <form action="{{ route('transactionItem.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card h-100">
                        <div class="card-header">
                            <div class="card-title">
                                Semua Barang
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-8">
                                    <!--begin::Search-->
                                    <form action="{{ route('customer.index') }}" method="get">
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                        height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                        fill="black" />
                                                    <path
                                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <input type="text" name="search"
                                                class="form-control form-control-solid w-250px ps-15 me-3"
                                                placeholder="Cari Barang">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                    <!--end::Search-->
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <a class="nav-link btn btn-active-color-primary btn-active-bg-light btn-color-gray-400 py-5"
                                                data-bs-toggle="tab" href="#kt_general_widget_1_2">
                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen059.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-2x mb-5 mx-0 me-3"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="15"
                                                        viewBox="0 0 16 15" fill="none">
                                                        <rect y="6" width="16" height="3" rx="1.5"
                                                            fill="black" />
                                                        <rect opacity="0.3" y="12" width="8" height="3"
                                                            rx="1.5" fill="black" />
                                                        <rect opacity="0.3" width="12" height="3" rx="1.5"
                                                            fill="black" />
                                                    </svg></span>
                                                <!--end::Svg Icon-->
                                                List
                                            </a>
                                        </div>
                                        <div class="col">
                                            <a class="nav-link btn btn-active-color-primary btn-active-bg-light btn-color-gray-400 py-5"
                                                data-bs-toggle="tab" href="#kt_general_widget_1_2">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                                                <span class="svg-icon svg-icon-2x mb-5 mx-0 me-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z"
                                                            fill="black"></path>
                                                        <path opacity="0.3"
                                                            d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z"
                                                            fill="black"></path>
                                                        <path opacity="0.3"
                                                            d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z"
                                                            fill="black"></path>
                                                        <path opacity="0.3"
                                                            d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z"
                                                            fill="black"></path>
                                                    </svg>
                                                </span>
                                                Grid
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="separator my-5"></div>

                            <div class="row">
                                <div class="table-responsive" id="divTableItem">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                        <thead>
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                <th>Nama Barang</th>
                                                <th>Batch Code</th>
                                                <th>Stok</th>
                                                <th class="text-end">Harga Jual</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $index => $item)
                                                @foreach ($item->itemStock as $itemStock)
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <!--begin::Thumbnail-->
                                                                <a href="{{ $item->img_url ?? asset('themes/metronic-demo9/media/illustrations/dozzy-1/13.png') }}"
                                                                    class="symbol symbol-50px">
                                                                    <span class="symbol-label"
                                                                        style="background-image: url('{{ $item->img_url ?? asset('themes/metronic-demo9/media/illustrations/dozzy-1/13.png') }}')"></span>
                                                                </a>
                                                                <!--end::Thumbnail-->

                                                                <div class="ms-5">
                                                                    <!--begin::Title-->
                                                                    <label
                                                                        class="text-gray-800 text-hover-primary fs-5 fw-bold">{{ Str::words($item->name, 6) }}</label>
                                                                    <!--end::Title-->
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <!--begin::Action=-->
                                                        <td class="text-center">
                                                            <label
                                                                class="text-primary fw-bolder fs-4">{{ $itemStock->batch_stock }}</label>
                                                        </td>
                                                        <td class="text-center">
                                                            <label
                                                                class="text-primary fw-bolder fs-4">{{ $itemStock->itemQty->qty }}</label>
                                                        </td>
                                                        <td class="text-end">
                                                            <label class="text-primary fw-bolder fs-4">
                                                                Rp.
                                                                {{ number_format($itemStock->itemPrice->price) }}</label>
                                                        </td>
                                                        <td class="text-center">
                                                            <button type="button" class="btn btn-primary"
                                                                onclick="addToCart({{ $item->id }}, {{ $itemStock->id }})">
                                                                <i class="fa fa-plus"></i> Tambah Barang
                                                            </button>
                                                        </td>
                                                        <!--end::Action=-->
                                                    </tr>
                                                @endforeach
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!--end::Table-->

                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-5" style="display: none;"
                                        id="overlayDivTableItem">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="row mb-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title"></div>
                                <!--begin::Card toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end me-3">
                                        <!--begin::Add customer-->
                                        <button type="button" class="btn btn-light-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalPilihBarang">
                                            <!--begin::Svg Icon | path: assets/media/icons/duotune/text/txt009.svg-->
                                            <span class="svg-icon svg-icon-muted svg-icon-2x"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3"
                                                        d="M17 10H11C10.4 10 10 9.6 10 9V8C10 7.4 10.4 7 11 7H17C17.6 7 18 7.4 18 8V9C18 9.6 17.6 10 17 10ZM22 4V3C22 2.4 21.6 2 21 2H11C10.4 2 10 2.4 10 3V4C10 4.6 10.4 5 11 5H21C21.6 5 22 4.6 22 4ZM22 15V14C22 13.4 21.6 13 21 13H11C10.4 13 10 13.4 10 14V15C10 15.6 10.4 16 11 16H21C21.6 16 22 15.6 22 15ZM18 20V19C18 18.4 17.6 18 17 18H11C10.4 18 10 18.4 10 19V20C10 20.6 10.4 21 11 21H17C17.6 21 18 20.6 18 20Z"
                                                        fill="black" />
                                                    <path
                                                        d="M8 5C8 6.7 6.7 8 5 8C3.3 8 2 6.7 2 5C2 3.3 3.3 2 5 2C6.7 2 8 3.3 8 5ZM5 4C4.4 4 4 4.4 4 5C4 5.6 4.4 6 5 6C5.6 6 6 5.6 6 5C6 4.4 5.6 4 5 4ZM8 16C8 17.7 6.7 19 5 19C3.3 19 2 17.7 2 16C2 14.3 3.3 13 5 13C6.7 13 8 14.3 8 16ZM5 15C4.4 15 4 15.4 4 16C4 16.6 4.4 17 5 17C5.6 17 6 16.6 6 16C6 15.4 5.6 15 5 15Z"
                                                        fill="black" />
                                                </svg></span>
                                            <!--end::Svg Icon-->
                                        </button>
                                        <!--end::Add customer-->
                                    </div>
                                    <!--end::Toolbar-->
                                    <!--begin::Toolbar-->
                                    <div class="d-flex justify-content-end">
                                        <!--begin::Add customer-->
                                        <button type="button" class="btn btn-lg btn-primary w-100"
                                            data-bs-toggle="modal" data-bs-target="#modalPilihBarang">
                                            Add Customer
                                        </button>
                                        <!--end::Add customer-->
                                    </div>
                                    <!--end::Toolbar-->
                                </div>
                                <!--end::Card toolbar-->
                            </div>
                            <div class="card-body">
                                <h1 class="text-center">
                                    Receipt
                                </h1>

                                <div class="separator my-10"></div>

                                <div id="divCart" class="h-250px scroll px-3">
                                    @forelse($cart_data as $index=>$item)
                                        <div class="row mb-5 d-flex align-items-center flex-wrap">
                                            <div class="col-5">
                                                <div class="d-flex align-items-sm-center">
                                                    <!--begin::Symbol-->
                                                    <div class="symbol symbol-40px symbol-2by2 me-4">
                                                        <div class="symbol-label"
                                                            style="background-image: url('{{ $item['associatedModel']->img_url ?? asset('themes/metronic-demo9/media/illustrations/dozzy-1/13.png') }}')">
                                                        </div>
                                                    </div>
                                                    <!--end::Symbol-->
                                                    <!--begin::Content-->
                                                    <div
                                                        class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                                                        <!--begin::Title-->
                                                        <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                                            <a href="#"
                                                                class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ $item['name'] }}</a>
                                                        </div>
                                                        <!--end::Title-->
                                                    </div>
                                                    <!--end::Content-->
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="row">
                                                    <div class="col">
                                                        <!--begin::Decrease control-->
                                                        <button type="button"
                                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary rounded-circle"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end"
                                                            onclick="decreaseCart({{ $item['rowId'] }})">

                                                            <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr014.svg-->
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path
                                                                        d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM18 12C18 11.4 17.6 11 17 11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H17C17.6 13 18 12.6 18 12Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->

                                                        </button>
                                                        <!--end::Decrease control-->
                                                    </div>
                                                    <div class="col py-2 text-center">
                                                        <label for="qty">{{ $item['qty'] }}</label>
                                                    </div>
                                                    <div class="col">
                                                        <!--begin::Increase control-->
                                                        <button type="button"
                                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary rounded-circle"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end"
                                                            onclick="increaseCart({{ $item['rowId'] }})">

                                                            <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr013.svg-->
                                                            <span class="svg-icon svg-icon-2">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none">
                                                                    <path opacity="0.3"
                                                                        d="M11 13H7C6.4 13 6 12.6 6 12C6 11.4 6.4 11 7 11H11V13ZM17 11H13V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z"
                                                                        fill="black" />
                                                                    <path
                                                                        d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM17 11H13V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7V11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z"
                                                                        fill="black" />
                                                                </svg>
                                                            </span>
                                                            <!--end::Svg Icon-->

                                                        </button>
                                                        <!--end::Increase control-->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-3 text-center">
                                                <label for="jumlahHarga" class="fs-5 text-primary fw-bolder">Rp
                                                    {{ number_format($item['price']) }}</label>
                                            </div>
                                        </div>
                                        <div class="separator mb-5"></div>
                                    @empty
                                        <div class="row">
                                            <div class="text-center">
                                                Tidak ada barang di pilih
                                            </div>
                                        </div>
                                    @endforelse

                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-5" style="display: none;"
                                        id="overlayDivCart">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                @php
                                    $totalItem = count($cart_data);
                                @endphp
                                {{-- @if ($totalItem > 0) --}}
                                <label for="labelTotal" class="fw-bolder fs-4" id="labelTotal"
                                    style="{{ $totalItem == 0 ? 'display:none;' : '' }}">Total
                                    (<span id="spanTotalItem">{{ number_format(@$totalItem) }}</span>) :
                                    <span id="spanSubTotal" class="text-primary">Rp
                                        {{ number_format(@$data_total['total']) }}</span></label>

                                {{-- @if ($data_total['diskon']) --}}
                                <br>
                                <label for="labelDiskon" class="text-muted fs-8" id="labelDiskon"
                                    style="{{ $data_total['diskon'] == 0 ? 'display:none;' : '' }}">Diskon :
                                    <span id="spanDiskon" class="text-primary">Rp
                                        {{ number_format(@$data_total['diskon']) }}</span></label>
                                {{-- @endif --}}
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <label for="tittleDiscount" class="fw-bolder fs-2">Input Discount</label>
                                </div>
                            </div>
                            <div class="card-body">

                                <div id="divInfoDiskon"
                                    style="{{ $data_total['diskon_value'] == null ? 'display:none;' : '' }}">
                                    <div class="d-flex align-items-center mb-5">
                                        <!--begin::Symbol-->
                                        <div class="symbol symbol-40px me-4">
                                            <span class="symbol-label bg-light">
                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/ecommerce/ecm011.svg-->
                                                <span class="svg-icon svg-icon-2 svg-icon-primary"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M21.6 11.2L19.3 8.89998V5.59993C19.3 4.99993 18.9 4.59993 18.3 4.59993H14.9L12.6 2.3C12.2 1.9 11.6 1.9 11.2 2.3L8.9 4.59993H5.6C5 4.59993 4.6 4.99993 4.6 5.59993V8.89998L2.3 11.2C1.9 11.6 1.9 12.1999 2.3 12.5999L4.6 14.9V18.2C4.6 18.8 5 19.2 5.6 19.2H8.9L11.2 21.5C11.6 21.9 12.2 21.9 12.6 21.5L14.9 19.2H18.2C18.8 19.2 19.2 18.8 19.2 18.2V14.9L21.5 12.5999C22 12.1999 22 11.6 21.6 11.2Z"
                                                            fill="black" />
                                                        <path
                                                            d="M11.3 9.40002C11.3 10.2 11.1 10.9 10.7 11.3C10.3 11.7 9.8 11.9 9.2 11.9C8.8 11.9 8.40001 11.8 8.10001 11.6C7.80001 11.4 7.50001 11.2 7.40001 10.8C7.20001 10.4 7.10001 10 7.10001 9.40002C7.10001 8.80002 7.20001 8.4 7.30001 8C7.40001 7.6 7.7 7.29998 8 7.09998C8.3 6.89998 8.7 6.80005 9.2 6.80005C9.5 6.80005 9.80001 6.9 10.1 7C10.4 7.1 10.6 7.3 10.8 7.5C11 7.7 11.1 8.00005 11.2 8.30005C11.3 8.60005 11.3 9.00002 11.3 9.40002ZM10.1 9.40002C10.1 8.80002 10 8.39998 9.90001 8.09998C9.80001 7.79998 9.6 7.70007 9.2 7.70007C9 7.70007 8.8 7.80002 8.7 7.90002C8.6 8.00002 8.50001 8.2 8.40001 8.5C8.40001 8.7 8.30001 9.10002 8.30001 9.40002C8.30001 9.80002 8.30001 10.1 8.40001 10.4C8.40001 10.6 8.5 10.8 8.7 11C8.8 11.1 9 11.2001 9.2 11.2001C9.5 11.2001 9.70001 11.1 9.90001 10.8C10 10.4 10.1 10 10.1 9.40002ZM14.9 7.80005L9.40001 16.7001C9.30001 16.9001 9.10001 17.1 8.90001 17.1C8.80001 17.1 8.70001 17.1 8.60001 17C8.50001 16.9 8.40001 16.8001 8.40001 16.7001C8.40001 16.6001 8.4 16.5 8.5 16.4L14 7.5C14.1 7.3 14.2 7.19998 14.3 7.09998C14.4 6.99998 14.5 7 14.6 7C14.7 7 14.8 6.99998 14.9 7.09998C15 7.19998 15 7.30002 15 7.40002C15.2 7.30002 15.1 7.50005 14.9 7.80005ZM16.6 14.2001C16.6 15.0001 16.4 15.7 16 16.1C15.6 16.5 15.1 16.7001 14.5 16.7001C14.1 16.7001 13.7 16.6 13.4 16.4C13.1 16.2 12.8 16 12.7 15.6C12.5 15.2 12.4 14.8001 12.4 14.2001C12.4 13.3001 12.6 12.7 12.9 12.3C13.2 11.9 13.7 11.7001 14.5 11.7001C14.8 11.7001 15.1 11.8 15.4 11.9C15.7 12 15.9 12.2 16.1 12.4C16.3 12.6 16.4 12.9001 16.5 13.2001C16.6 13.4001 16.6 13.8001 16.6 14.2001ZM15.4 14.1C15.4 13.5 15.3 13.1 15.2 12.9C15.1 12.6 14.9 12.5 14.5 12.5C14.3 12.5 14.1 12.6001 14 12.7001C13.9 12.8001 13.8 13.0001 13.7 13.2001C13.6 13.4001 13.6 13.8 13.6 14.1C13.6 14.7 13.7 15.1 13.8 15.4C13.9 15.7 14.1 15.8 14.5 15.8C14.8 15.8 15 15.7 15.2 15.4C15.3 15.2 15.4 14.7 15.4 14.1Z"
                                                            fill="black" />
                                                    </svg></span>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Symbol-->

                                        <!--begin::Title-->
                                        <div class="d-flex flex-column me-20">
                                            <a href="#" class="fs-6 text-gray-800 text-hover-primary fw-bold"
                                                id="labelDiskonValue">{{ $data_total['diskon_value'] }}</a>
                                            <span class="fs-7 text-muted fw-bold">Diskon di terapkan pada transaksi
                                                ini</span>
                                        </div>
                                        <!--end::Title-->

                                        <a onclick="removeDiscount()"
                                            class="btn btn-sm btn-icon btn-bg-light btn-active-color-warning">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-40px">
                                                <span class="symbol-label bg-light">
                                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr019.svg-->
                                                    <span class="svg-icon svg-icon-2 svg-icon-danger"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3"
                                                                d="M12 10.6L14.8 7.8C15.2 7.4 15.8 7.4 16.2 7.8C16.6 8.2 16.6 8.80002 16.2 9.20002L13.4 12L12 10.6ZM10.6 12L7.8 14.8C7.4 15.2 7.4 15.8 7.8 16.2C8 16.4 8.30001 16.5 8.50001 16.5C8.70001 16.5 9.00002 16.4 9.20002 16.2L12 13.4L10.6 12Z"
                                                                fill="black" />
                                                            <path
                                                                d="M21 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H21C21.6 2 22 2.4 22 3V21C22 21.6 21.6 22 21 22ZM13.4 12L16.2 9.20001C16.6 8.80001 16.6 8.19999 16.2 7.79999C15.8 7.39999 15.2 7.39999 14.8 7.79999L12 10.6L9.20001 7.79999C8.80001 7.39999 8.19999 7.39999 7.79999 7.79999C7.39999 8.19999 7.39999 8.80001 7.79999 9.20001L10.6 12L7.79999 14.8C7.39999 15.2 7.39999 15.8 7.79999 16.2C7.99999 16.4 8.3 16.5 8.5 16.5C8.7 16.5 9.00001 16.4 9.20001 16.2L12 13.4L14.8 16.2C15 16.4 15.3 16.5 15.5 16.5C15.7 16.5 16 16.4 16.2 16.2C16.6 15.8 16.6 15.2 16.2 14.8L13.4 12Z"
                                                                fill="black" />
                                                        </svg></span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                        </a>
                                    </div>
                                </div>

                                <div id="divInputDiskon"
                                    style="{{ $data_total['diskon_value'] != null ? 'display:none;' : '' }}">
                                    <!--begin::Input group-->
                                    <div class="input-group mb-5">
                                        <input type="number" class="form-control" placeholder="Masukan nominal diskon"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2"
                                            name="inputDiscount" />
                                        <span class="input-group-text" id="basic-addon2">
                                            <i class="fas fa-percent fs-4"></i>
                                        </span>
                                        <button type="button" class="btn btn-primary"
                                            onclick="addDiscount()">Tambahkan</button>
                                    </div>
                                    <!--end::Input group-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <label for="tittleDiscount" class="fw-bolder fs-2">Metode Pembayaran</label>
                                </div>
                            </div>
                            <div class="card-body">
                                <select class="form-select" aria-label="Select example">
                                    <option>Klik untuk memilih metode pembayaran</option>
                                    <option value="1"><i class="fa fa-money"></i> Cash</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!--begin::Add customer-->
                        <button type="button" id="btnPembayaran" class="btn btn-lg btn-primary w-100"
                            data-bs-toggle="modal" data-bs-target="#modalDetailTransaksi"
                            {{ $cart_data ? '' : 'disabled' }}>
                            Pembayaran
                        </button>
                        <!--end::Add customer-->
                    </div>

                </div>

            </div>
        </form>

        <div class="modal fade" tabindex="-1" id="modalDetailTransaksi">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Transaksi</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black"></rect>
                                </svg>
                            </span>
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <table class="table">
                                    <thead>
                                        <tr class="fw-bolder fs-6 text-gray-800">
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Sub Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="listCartTable">
                                        @forelse($cart_data as $index=>$item)
                                            <tr>
                                                <td>{{ $item['name'] }}</td>
                                                <td class="text-center">{{ $item['qty'] }}</td>
                                                <td class="text-center">Rp {{ number_format($item['pricesingle']) }}</td>
                                                <td class="text-center">Rp {{ number_format($item['price']) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4">Tidak ada barang dipilih</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>

                                <div class="separator my-10"></div>
                                <h1>Rincian Pembayaran</h1>
                                <table class="table g-5 gs-0 mb-0 fw-bolder text-gray-700">
                                    <tbody>
                                        <tr>
                                            <td class="fs-4 ps-0">Sub Total</td>
                                            <td class="text-end fs-4 text-nowrap" id="detailSubTotal">Rp
                                                {{ number_format(@$data_total['sub_total']) }}
                                            </td>
                                        </tr>
                                        <tr style="{{ $data_total['diskon'] == 0 ? 'display:none;' : '' }}"
                                            id="trDetailDiskon">
                                            <td class="fs-6 text-gray-600">Discount</td>
                                            <td class="fs-6 text-end text-gray-600" id="detailDiskon">- Rp
                                                {{ number_format(@$data_total['diskon']) }}</td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="border-top align-top fs-6 fw-bolder text-gray-700">
                                            <td class="fs-4">Metode Pembayaran</td>
                                            <td class="fs-4 text-primary text-end">Cash</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input id="nominalPembayaran" type="number"
                                                    class="form-control form-control-lg form-control-solid"
                                                    name="nominalPembayaran" placeholder="Masukan nominal pembayaran"
                                                    value="">
                                            </td>
                                        </tr>
                                        <tr class="border-top align-top fs-6 fw-bolder text-gray-700">
                                            <td class="fs-4 text-success">Total Pembayaran</td>
                                            <td class="fs-4 text-end text-success" id="detailTotalPembayaran">Rp
                                                {{ number_format(@$data_total['total']) }}</td>
                                        </tr>
                                        <tr id="trDetailNominalCash">
                                            <td class="fs-6 text-gray-600">Cash</td>
                                            <td class="fs-6 text-end text-gray-600" id="detailNominalCash">Rp 0</td>
                                        </tr>
                                        <tr id="trDetailNominalKembalian">
                                            <td class="fs-6 text-gray-600">Kembalian</td>
                                            <td class="fs-6 text-end text-gray-600" id="detailNominalKembalian">Rp 0</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveButton" disabled
                            onclick="simpanTransaksi()">Simpan Transaksi</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="overlay-layer card-rounded bg-dark bg-opacity-5" style="display: none;"
            id="overlayDivContainerTransaksi">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
@endsection
@section('onpage-js')
    <script>
        var totalPembayaran = parseInt({{ @$data_total['total'] }}) ? parseInt({{ @$data_total['total'] }}) : 0;
        var kembalian = 0;

        $('#modalDetailTransaksi').on('shown.bs.modal', function() {
            $('#nominalPembayaran').trigger('focus');
        });

        nominalPembayaran.oninput = function() {
            console.log(totalPembayaran);
            // let jumlah = parseInt({{ @$data_total['total'] }}) ? parseInt({{ @$data_total['total'] }}) : 0;
            let jumlah = parseInt(totalPembayaran);
            let bayar = parseInt(document.getElementById('nominalPembayaran').value) ? parseInt(document.getElementById(
                    'nominalPembayaran')
                .value) : 0;
            let hasil = bayar - jumlah;

            document.getElementById("detailNominalCash").innerHTML = bayar ? 'Rp ' + rupiah(bayar) : 'Rp ' + 0;
            document.getElementById("detailNominalKembalian").innerHTML = hasil ? 'Rp ' + rupiah(hasil) : 'Rp ' + 0;
            kembalian = hasil;

            cek(bayar, jumlah);
            const saveButton = document.getElementById("saveButton");

            if (jumlah === 0) {
                saveButton.disabled = true;
            }

        };

        function cek(bayar, jumlah) {
            const saveButton = document.getElementById("saveButton");

            if (bayar < jumlah) {
                saveButton.disabled = true;
            } else {
                saveButton.disabled = false;
            }
        }

        function rupiah(bilangan) {
            var number_string = bilangan.toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        }

        function simpanTransaksi() {
            var divFormId = "divContainerTransaksi";
            var overlayId = "overlayDivContainerTransaksi";

            var route = '{{ route('transactionItem.store') }}';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                data: {
                    nominalPembayaran: parseInt(document.getElementById('nominalPembayaran').value),
                    kembalian: kembalian
                },
                type: "POST",
                beforeSend: function() {
                    $('#modalDetailTransaksi').modal('hide');
                    $('#' + divFormId).addClass('overlay overlay-block');
                    $("#" + overlayId).show();
                },
                success: function(response) {
                    console.log(response);
                    if (response.data.success == true) {
                        Swal.fire({
                            html: response.data.message,
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "OK",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function(isConfirm) {
                            getCart();
                            removeDiscount();
                            $('#' + divFormId).removeClass('overlay overlay-block');
                            $("#" + overlayId).hide();
                        });
                    } else {
                        Swal.fire({
                            html: response.data.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "OK",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function(isConfirm) {
                            $('#' + divFormId).removeClass('overlay overlay-block');
                            $("#" + overlayId).hide();
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        html: "Error Please try again.<br> <strong>" + response.data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function(isConfirm) {
                        $('#' + divFormId).removeClass('overlay overlay-block');
                        $("#" + overlayId).hide();
                    });
                }
            });
        }

        function getCart() {
            var divFormId = "divCart";
            var overlayId = "overlayDivCart";
            var route = '{{ route('transactionItem.index') }}';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                type: "GET",
                beforeSend: function() {
                    $('#' + divFormId).addClass('overlay overlay-block');
                    $("#" + overlayId).show();
                },
                success: function(response) {
                    console.log(response);

                    $("#divCart").empty();
                    $("#listCartTable").empty();

                    var html = "";
                    var html2 = "";

                    var defaultImg =
                        "{{ asset('themes/metronic-demo9/media/illustrations/dozzy-1/13.png') }}";

                    var data = response.data['cart_data'];

                    data.sort(function(a, b) {
                        return new Date(a.created_at) - new Date(b.created_at)
                    });

                    data.forEach((item) => {

                        var img = item['associatedModel']['img_url'] ?? defaultImg;
                        var price = item['price'].toLocaleString(
                            undefined, {
                                minimumFractionDigits: 0
                            }
                        );

                        html += `
                            <div class="row mb-5 d-flex align-items-center flex-wrap">
                                <div class="col-5">
                                    <div class="d-flex align-items-sm-center">
                                        <div class="symbol symbol-40px symbol-2by2 me-4">
                                            <div class="symbol-label" style="background-image: url('` + img + `')">
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                                            <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                                <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">` +
                            item['name'] + `</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col">
                                            <!--begin::Decrease control-->
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary rounded-circle"
                                                data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end"
                                                onclick="decreaseCart(` + item['rowId'] + `)">

                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr014.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM18 12C18 11.4 17.6 11 17 11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H17C17.6 13 18 12.6 18 12Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->

                                            </button>
                                            <!--end::Decrease control-->
                                        </div>
                                        <div class="col py-2 text-center">
                                            <label for="qty">` + item['qty'] + `</label>
                                        </div>
                                        <div class="col">
                                            <!--begin::Increase control-->
                                            <button type="button"
                                                class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary rounded-circle"
                                                data-kt-menu-trigger="click"
                                                data-kt-menu-placement="bottom-end"
                                                onclick="increaseCart(` + item['rowId'] + `)">

                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr013.svg-->
                                                <span class="svg-icon svg-icon-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3"
                                                            d="M11 13H7C6.4 13 6 12.6 6 12C6 11.4 6.4 11 7 11H11V13ZM17 11H13V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z"
                                                            fill="black" />
                                                        <path
                                                            d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM17 11H13V7C13 6.4 12.6 6 12 6C11.4 6 11 6.4 11 7V11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V13H17C17.6 13 18 12.6 18 12C18 11.4 17.6 11 17 11Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->

                                            </button>
                                            <!--end::Increase control-->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 text-center">
                                    <label for="jumlahHarga" class="fs-5 text-primary fw-bolder">Rp ` + price + `</label>
                                </div>
                            </div>
                            <div class="separator mb-5"></div>
                            
                            <div class="overlay-layer card-rounded bg-dark bg-opacity-5" style="display: none;" id="overlayDivCart">
                                <div class="spinner-border text-primary" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        `;

                        var priceSingle = item['pricesingle'].toLocaleString(
                            undefined, {
                                minimumFractionDigits: 0
                            }
                        );

                        html2 += `
                            <tr>
                                <td>` + item['name'] + `</td>
                                <td class="text-center">` + item['qty'] + `</td>
                                <td class="text-center">Rp ` + priceSingle + `</td>
                                <td class="text-center">Rp ` + price + `</td>
                            </tr>
                        `;
                    });

                    $("#divCart").html(html);
                    $("#listCartTable").html(html2);

                    if (data.length > 0) {
                        $("#btnPembayaran").prop("disabled", false);
                    } else {
                        $("#btnPembayaran").prop("disabled", true);
                        $("#divCart").html(`
                            <div class="row">
                                <div class="text-center">
                                    Tidak ada barang di pilih
                                </div>
                            </div>
                        `);
                    }

                    if ((data.length > 0) && (response.data['data_total'].total > 0)) {
                        $("#spanTotalItem").text(data.length);
                        $("#spanSubTotal").text("Rp " + response.data['data_total'].total.toLocaleString(
                            undefined, {
                                minimumFractionDigits: 0
                            }
                        ));
                        $("#detailSubTotal").text("Rp " + response.data['data_total'].sub_total
                            .toLocaleString(
                                undefined, {
                                    minimumFractionDigits: 0
                                }
                            ));
                        $("#detailTotalPembayaran").text("Rp " + response.data['data_total'].total
                            .toLocaleString(
                                undefined, {
                                    minimumFractionDigits: 0
                                }
                            ));

                        totalPembayaran = response.data['data_total'].total;

                        $("#labelTotal").show();
                    } else {
                        $("#labelTotal").hide();
                    }

                    if (response.data['data_total'].diskon > 0) {
                        $("#spanDiskon").text("Rp " + response.data['data_total'].diskon.toLocaleString(
                            undefined, {
                                minimumFractionDigits: 0
                            }
                        ));
                        $("#detailDiskon").text("- Rp " + response.data['data_total'].diskon.toLocaleString(
                            undefined, {
                                minimumFractionDigits: 0
                            }
                        ));
                        $("#labelDiskonValue").text(response.data['data_total'].diskon_value);
                        $("#trDetailDiskon").show();
                        $("#labelDiskon").show();
                        $("#divInfoDiskon").show();
                        $("#divInputDiskon").hide();
                    } else {
                        $("#trDetailDiskon").hide();
                        $("#labelDiskon").hide();
                        $("#divInfoDiskon").hide();
                        $("#divInputDiskon").show();
                    }

                    $('#' + divFormId).removeClass('overlay overlay-block');
                    $("#" + overlayId).hide();
                }
            });
        }

        function addToCart(id, idStock) {
            var divFormId = "divTableItem";
            var overlayId = "overlayDivTableItem";

            var route = '{{ route('transactionItem.addCart') }}';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                data: {
                    idBarang: id,
                    idStock: idStock
                },
                type: "POST",
                beforeSend: function() {
                    $('#' + divFormId).addClass('overlay overlay-block');
                    $("#" + overlayId).show();
                },
                success: function(response) {
                    console.log(response);
                    if (response.data.success == true) {
                        getCart();
                        $('#' + divFormId).removeClass('overlay overlay-block');
                        $("#" + overlayId).hide();
                    } else {
                        Swal.fire({
                            html: response.data.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "OK",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function(isConfirm) {
                            $('#' + divFormId).removeClass('overlay overlay-block');
                            $("#" + overlayId).hide();
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        html: "Error Please try again.<br> <strong>" + response.data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function(isConfirm) {
                        $('#' + divFormId).removeClass('overlay overlay-block');
                        $("#" + overlayId).hide();
                    });
                }
            });
        }

        function increaseCart(id) {
            var divFormId = "divCart";
            var overlayId = "overlayDivCart";

            var route = '{{ route('transactionItem.increaseCart') }}';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                data: {
                    itemId: id
                },
                type: "POST",
                beforeSend: function() {
                    $('#' + divFormId).addClass('overlay overlay-block');
                    $("#" + overlayId).show();
                },
                success: function(response) {
                    console.log(response);
                    if (response.data.success == true) {
                        getCart();
                        $('#' + divFormId).removeClass('overlay overlay-block');
                        $("#" + overlayId).hide();
                    } else {
                        Swal.fire({
                            html: response.data.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "OK",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function(isConfirm) {
                            $('#' + divFormId).removeClass('overlay overlay-block');
                            $("#" + overlayId).hide();
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        html: "Error Please try again.<br> <strong>" + response.data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function(isConfirm) {
                        $('#' + divFormId).removeClass('overlay overlay-block');
                        $("#" + overlayId).hide();
                    });
                }
            });
        }

        function decreaseCart(id) {
            var divFormId = "divCart";
            var overlayId = "overlayDivCart";

            var route = '{{ route('transactionItem.decreaseCart') }}';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                data: {
                    itemId: id
                },
                type: "POST",
                beforeSend: function() {
                    $('#' + divFormId).addClass('overlay overlay-block');
                    $("#" + overlayId).show();
                },
                success: function(response) {
                    console.log(response);
                    if (response.data.success == true) {
                        getCart();
                        $('#' + divFormId).removeClass('overlay overlay-block');
                        $("#" + overlayId).hide();
                    } else {
                        Swal.fire({
                            html: response.data.message,
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "OK",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function(isConfirm) {
                            $('#' + divFormId).removeClass('overlay overlay-block');
                            $("#" + overlayId).hide();
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    Swal.fire({
                        html: "Error Please try again.<br> <strong>" + response.data.message,
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function(isConfirm) {
                        $('#' + divFormId).removeClass('overlay overlay-block');
                        $("#" + overlayId).hide();
                    });
                }
            });
        }

        function addDiscount() {
            var discountValue = $('input[name="inputDiscount"]').val();

            var divFormId = "divCart";
            var overlayId = "overlayDivCart";
            var route = '{{ route('transactionItem.addDiscount') }}';

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: route,
                data: {
                    discount: discountValue
                },
                type: "POST",
                beforeSend: function() {
                    $('#' + divFormId).addClass('overlay overlay-block');
                    $("#" + overlayId).show();
                },
                success: function(response) {
                    console.log(response);
                    $('input[name="inputDiscount"]').val('');
                    getCart();

                    $("#spanTotalItem").text(data.length);
                    $("#spanSubTotal").text("Rp " + response.data['data_total'].sub_total.toLocaleString(
                        undefined, {
                            minimumFractionDigits: 0
                        }
                    ));

                    $('#' + divFormId).removeClass('overlay overlay-block');
                    $("#" + overlayId).hide();
                }
            });
        }

        function removeDiscount() {

            var divFormId = "divCart";
            var overlayId = "overlayDivCart";
            var route = '{{ route('transactionItem.removeDiscount') }}';

            Swal.fire({
                text: "Anda yakin akan hapus discount ?",
                icon: "warning",
                showCancelButton: !0,
                buttonsStyling: !1,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
                customClass: {
                    confirmButton: "btn fw-bold btn-danger",
                    cancelButton: "btn fw-bold btn-active-light-primary"
                }
            }).then((result) => {
                // console.log(result)
                if (result.isConfirmed == false) {
                    return false;
                } else {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: route,
                        data: {
                            discount: 0
                        },
                        type: "POST",
                        beforeSend: function() {
                            $('#' + divFormId).addClass('overlay overlay-block');
                            $("#" + overlayId).show();
                        },
                        success: function(response) {
                            getCart();

                            $("#spanTotalItem").text(data.length);
                            $("#spanSubTotal").text("Rp " + response.data['data_total'].sub_total
                                .toLocaleString(
                                    undefined, {
                                        minimumFractionDigits: 0
                                    }
                                ));

                            $('#' + divFormId).removeClass('overlay overlay-block');
                            $("#" + overlayId).hide();
                        }
                    });
                }
            });
        }
    </script>
@endsection
