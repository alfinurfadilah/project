@extends('layouts.app')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
    <!--begin::Card-->
    <div class="card mb-10">
        @if (Session::has('success'))
            @include('layouts.flash-success', ['message' => Session('success')])
        @endif

        @if (Session::has('error'))
            @include('layouts.flash-error', ['message' => Session('error')])
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @include('layouts.flash-error', ['message' => $error])
            @endforeach
        @endif
        <!--begin::Card body-->
        <div class="card-body pt-5">
            <div class="d-flex flex-wrap flex-sm-nowrap">
                <!--begin: Pic-->
                <div class="d-flex align-items-center me-7">
                    <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                        <img src="{{ asset($item->img_url ?? 'themes/metronic-demo9/media/illustrations/dozzy-1/13.png') }}"
                            alt="image">
                    </div>
                </div>
                <!--end::Pic-->
                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between align-items-start flex-wrap">
                        <!--begin::User-->
                        <div class="d-flex flex-column">
                            <!--begin::Name-->
                            <div class="d-flex align-items-center mb-2">
                                <a href="#"
                                    class="text-gray-900 text-hover-primary fs-2 fw-bolder me-1">{{ $item->name }}</a>
                            </div>
                            <!--end::Name-->
                            <!--begin::Info-->
                            <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                                <a href="#"
                                    class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com006.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
                                                fill="black"></path>
                                            <path
                                                d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                    {{ $item->itemCategories->name }}
                                    <!--end::Svg Icon-->
                                </a>
                                <a href="#"
                                    class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen018.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M18.0624 15.3453L13.1624 20.7453C12.5624 21.4453 11.5624 21.4453 10.9624 20.7453L6.06242 15.3453C4.56242 13.6453 3.76242 11.4453 4.06242 8.94534C4.56242 5.34534 7.46242 2.44534 11.0624 2.04534C15.8624 1.54534 19.9624 5.24534 19.9624 9.94534C20.0624 12.0453 19.2624 13.9453 18.0624 15.3453Z"
                                                fill="black"></path>
                                            <path
                                                d="M12.0624 13.0453C13.7193 13.0453 15.0624 11.7022 15.0624 10.0453C15.0624 8.38849 13.7193 7.04535 12.0624 7.04535C10.4056 7.04535 9.06241 8.38849 9.06241 10.0453C9.06241 11.7022 10.4056 13.0453 12.0624 13.0453Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    {{ $item->itemType->name }}
                                </a>
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User-->
                        <!--begin::Actions-->
                        {{-- <div class="d-flex my-4">
                        <a href="#" class="btn btn-sm btn-light me-2" id="kt_user_follow_button">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr012.svg-->
                            <span class="svg-icon svg-icon-3 d-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M10 18C9.7 18 9.5 17.9 9.3 17.7L2.3 10.7C1.9 10.3 1.9 9.7 2.3 9.3C2.7 8.9 3.29999 8.9 3.69999 9.3L10.7 16.3C11.1 16.7 11.1 17.3 10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black"></path>
                                    <path d="M10 18C9.7 18 9.5 17.9 9.3 17.7C8.9 17.3 8.9 16.7 9.3 16.3L20.3 5.3C20.7 4.9 21.3 4.9 21.7 5.3C22.1 5.7 22.1 6.30002 21.7 6.70002L10.7 17.7C10.5 17.9 10.3 18 10 18Z" fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <!--begin::Indicator-->
                            <span class="indicator-label">Follow</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            <!--end::Indicator-->
                        </a>
                        <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Hire Me</a>
                        <!--begin::Menu-->
                        <div class="me-0">
                            <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="bi bi-three-dots fs-3"></i>
                            </button>
                            <!--begin::Menu 3-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3" data-kt-menu="true">
                                <!--begin::Heading-->
                                <div class="menu-item px-3">
                                    <div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
                                </div>
                                <!--end::Heading-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Create Invoice</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link flex-stack px-3">Create Payment
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Specify a target name for future usage and reference" aria-label="Specify a target name for future usage and reference"></i></a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Generate Bill</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
                                    <a href="#" class="menu-link px-3">
                                        <span class="menu-title">Subscription</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <!--begin::Menu sub-->
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Plans</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Billing</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-3">Statements</a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu separator-->
                                        <div class="separator my-2"></div>
                                        <!--end::Menu separator-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3">
                                                <!--begin::Switch-->
                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <!--begin::Input-->
                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications">
                                                    <!--end::Input-->
                                                    <!--end::Label-->
                                                    <span class="form-check-label text-muted fs-6">Recuring</span>
                                                    <!--end::Label-->
                                                </label>
                                                <!--end::Switch-->
                                            </div>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu sub-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3 my-1">
                                    <a href="#" class="menu-link px-3">Settings</a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 3-->
                        </div>
                        <!--end::Menu-->
                    </div> --}}
                        <!--end::Actions-->
                    </div>
                    <!--end::Title-->
                    <!--begin::Stats-->
                    <div class="d-flex flex-wrap flex-stack">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-column flex-grow-1 pe-8">
                            <!--begin::Stats-->
                            <div class="d-flex flex-wrap">
                                <!--begin::Stat-->
                                <div class="border border-gray-300 border-dashed rounded min-w-100 py-3 px-4 me-6 mb-3">
                                    <!--begin::Label-->
                                    <div class="fw-bold fs-6 text-gray-400">{{ $item->description }}</div>
                                    <!--end::Label-->
                                </div>
                                <!--end::Stat-->
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h4>Daftar Batch</h4>
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Add customer-->
                    <a href="{{ route('item.create') }}" class="btn btn-primary" data-bs-target="#kt_modal_atur_stock"
                        data-bs-toggle="modal" data-item-id="{{ $item->id }}">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr087.svg-->
                        <span class="svg-icon
                        svg-icon-muted svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11" y="18" width="12" height="2"
                                    rx="1" transform="rotate(-90 11 18)" fill="black" />
                                <rect x="6" y="11" width="12" height="2" rx="1"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        Tambah Batch
                    </a>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <div class="card-body">

            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>Batch ID</th>
                            <th>Stok</th>
                            <th>Tanggal Produksi</th>
                            <th>Tanggal Kadaluarsa</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item->itemStock as $index => $itemStock)
                            <tr>
                                <td>{{ $itemStock->batch_stock }}</td>
                                <td>{{ $itemStock->itemQty->qty }}</td>
                                <td>{{ date_format(date_create($itemStock->production_date), 'd F Y') }}</td>
                                @php
                                    $dateNow = date_create(date('Y/m/d'));
                                    $dateExp = date_create($itemStock->expired_date);
                                    $interval = $dateNow->diff($dateExp);
                                    
                                    $year = $interval->y > 0 ? $interval->y . ' Tahun, ' : '';
                                    $month = $interval->m > 0 ? $interval->m . ' Bulan, ' : '';
                                    $day = $interval->d > 0 ? $interval->d . ' Hari' : '';
                                    
                                    $expiredLeft = $year . $month . $day;
                                    // dd($expiredLeft);
                                    // dd('difference ' . $interval->y . ' years, ' . $interval->m . ' months, ' . $interval->d . ' days ');
                                @endphp
                                <td>
                                    {{ date_format(date_create($itemStock->expired_date), 'd F Y') }}
                                    ({{ $expiredLeft }} tersisa)
                                </td>
                                <td>Rp. {{ number_format($itemStock->itemPrice->current_price) }}</td>
                                <td>Rp. {{ number_format($itemStock->itemPrice->price) }}</td>
                                <td class="text-end">
                                    <a href="#" class="btn btn-primary" data-bs-target="#kt_modal_atur_stock"
                                        data-bs-toggle="modal" data-item-id="{{ $item->id }}"
                                        data-stock-id="{{ $itemStock->id }}" data-qty-id="{{ $itemStock->item_qty_id }}"
                                        data-price-id="{{ $itemStock->item_price_id }}"
                                        data-batch-id="{{ $itemStock->batch_stock }}"
                                        data-qty="{{ $itemStock->itemQty->qty }}"
                                        data-production-date="{{ date_format(date_create($itemStock->production_date), 'd F Y') }}"
                                        data-expired-date="{{ date_format(date_create($itemStock->expired_date), 'd F Y') }}"
                                        data-current-price="{{ $itemStock->itemPrice->current_price }}"
                                        data-price="{{ $itemStock->itemPrice->price }}">Atur Stock &
                                        Harga</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end::Table-->
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="kt_modal_atur_stock">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atur Stock & Harga</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x"></span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <form action="{{ route('item.updateStock') }}" method="POST" id="formAturStock">
                        @csrf
                        <input type="hidden" name="itemId">
                        <input type="hidden" name="stockId">
                        <input type="hidden" name="qtyId">
                        <input type="hidden" name="priceId">
                        <div class="row">
                            <div class="col">
                                <div class="fv-row mb-5">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="jumlahStock">Batch ID</label>
                                            <label class="form-control label" id="labelBatchId"></label>
                                            <input type="text" class="form-control" name="batchId" hidden>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-5">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label required" for="jumlahStock">Jumlah Stock</label>
                                            <input type="text" class="form-control" name="jumlahStock">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-10">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hargaJual">Tanggal Produksi</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                                            <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                    viewBox="0 0 20 21" fill="none">
                                                    <path opacity="0.3"
                                                        d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                        fill="black" />
                                                    <path
                                                        d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </span>
                                        <input class="form-control flatpickr-input active fw-200" placeholder="Pick date"
                                            type="text" readonly="readonly" name="tglProduksi"
                                            id="datepicker_tgl_produksi">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="hargaJual">Tanggal Kadaluarsa</label>
                                    <div class="col d-flex align-items-center">
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                                                <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21"
                                                        viewBox="0 0 20 21" fill="none">
                                                        <path opacity="0.3"
                                                            d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z"
                                                            fill="black" />
                                                        <path
                                                            d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </span>
                                            <input class="form-control flatpickr-input active fw-200"
                                                placeholder="Pick date" type="text" readonly="readonly"
                                                name="tglKadaluarsa" id="datepicker_tgl_kadaluarsa">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="fv-row mb-10">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hargaJual">Harga Modal</label>
                                            <input class="form-control" type="text" name="hargaModal">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="fv-row mb-10">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hargaJual">Harga Jual</label>
                                            <input class="form-control" type="text" name="hargaJual">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnAturStock">Simpan</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('onpage-js')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('themes/metronic-demo9/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->

    <script>
        // Form Validator
        // Define form element
        const form = document.getElementById('formAturStock');
        var validator = [];

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Validator untuk di step 1
        validator.push(FormValidation.formValidation(
            form, {
                fields: {
                    'jumlahStock': {
                        validators: {
                            notEmpty: {
                                message: 'Jumlah stock tidak boleh kosong'
                            },
                            numeric: {
                                message: 'Jumlah stok harus berupa angka'
                            },
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: 'is-invalid',
                        eleValidClass: ''
                    })
                }
            }
        ));

        //triggered when modal is about to be shown
        $('#kt_modal_atur_stock').on('show.bs.modal', function(e) {
            //get data-id attribute of the clicked element
            var itemId = $(e.relatedTarget).data('item-id');
            var stockId = $(e.relatedTarget).data('stock-id');
            var qtyId = $(e.relatedTarget).data('qty-id');
            var priceId = $(e.relatedTarget).data('price-id');
            var batchId = $(e.relatedTarget).data('batch-id');
            var qty = $(e.relatedTarget).data('qty');
            var productionDate = $(e.relatedTarget).data('production-date');
            var expiredDate = $(e.relatedTarget).data('expired-date');
            var currentPrice = $(e.relatedTarget).data('current-price');
            var price = $(e.relatedTarget).data('price');

            //populate the textbox
            $(e.currentTarget).find('input[name="itemId"]').val(itemId);
            $(e.currentTarget).find('input[name="stockId"]').val(stockId);
            $(e.currentTarget).find('input[name="qtyId"]').val(qtyId);
            $(e.currentTarget).find('input[name="priceId"]').val(priceId);

            if (batchId == undefined) {
                $(e.currentTarget).find('input[name="batchId"]').attr("hidden", false);
                $(e.currentTarget).find('#labelBatchId').attr("hidden", true);
            } else {
                $(e.currentTarget).find('#labelBatchId').attr("hidden", false);
                $(e.currentTarget).find('input[name="batchId"]').attr("hidden", true);
                $(e.currentTarget).find('#labelBatchId').text(batchId);
            }

            $(e.currentTarget).find('input[name="jumlahStock"]').val(qty);


            console.log(productionDate);
            // init datepicker
            if ((productionDate == undefined) && (expiredDate == undefined)) {

                $('#datepicker_tgl_produksi').flatpickr({
                    dateFormat: "d F Y",
                    defaultDate: ''
                });
                $('#datepicker_tgl_kadaluarsa').flatpickr({
                    dateFormat: "d F Y",
                    defaultDate: ''
                });

            } else {

                $('#datepicker_tgl_produksi').flatpickr({
                    dateFormat: "d F Y",
                    defaultDate: productionDate,
                });
                $('#datepicker_tgl_kadaluarsa').flatpickr({
                    dateFormat: "d F Y",
                    defaultDate: expiredDate,
                });

            }

            $(e.currentTarget).find('input[name="hargaModal"]').val(currentPrice);
            $(e.currentTarget).find('input[name="hargaJual"]').val(price);
        });

        $("#btnAturStock").on("click", function(e) {
            var validate = validator[0];

            // Validate form before submit
            if (validate) {
                validate.validate().then(function(status) {
                    if (status == 'Valid') {
                        $('form#formAturStock').submit();
                    }
                });
            } else {
                $('form#formAturStock').submit();
            }
        });
    </script>
@endsection
