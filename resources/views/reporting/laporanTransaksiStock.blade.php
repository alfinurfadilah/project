@extends('layouts.app')
@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h1>Laporan Transaksi Stock</h1>
            </div>
        </div>
        <div class="card-header">
            <div class="card-title">
                <div class="py-5">
                    <label class="form-label">Periode</label>
                    <input class="form-control form-control-solid position-relative w-200px" placeholder="Pick date rage"
                        name="dateRangePicker" id="dateRangePickerAttendance">
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="shadow-sm p-3 bg-white rounded">
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2 p-5">
                                <span class="fw-bold d-block fs-5">Total Stock Masuk</span>
                                <a href="#"
                                    class="text-gray-800 text-hover-primary fs-2 fw-bolder">{{ number_format($totalStockMasuk) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="shadow-sm p-3 bg-white rounded">
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2 p-5">
                                <span class="fw-bold d-block fs-5">Total Stock Keluar</span>
                                <a href="#"
                                    class="text-gray-800 text-hover-primary fs-2 fw-bolder">{{ number_format($totalStockKeluar) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">
                <h1>Riwayat Transaksi Stock</h1>
            </div>
        </div>
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="black"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-kt-customer-table-filter="search"
                        class="form-control form-control-solid w-250px ps-15" placeholder="Cari barang / batch">
                </div>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Filter-->
                    <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                        data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                    fill="black"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Filter
                    </button>
                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                        id="kt-toolbar-filter" style="">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div>
                        <!--end::Separator-->
                        <!--begin::Content-->
                        <div class="px-7 py-5">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label for="" class="form-label">Tanggal :</label>
                                <input class="form-control" placeholder="Pilih tanggal" id="kt_datepicker_1" />
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-5 fw-bold mb-3">Jenis Transaksi :</label>
                                <!--end::Label-->
                                <!--begin::Options-->
                                <div class="d-flex flex-column flex-wrap fw-bold"
                                    data-kt-customer-table-filter="payment_type">
                                    <!--begin::Option-->
                                    <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                        <input class="form-check-input" type="radio" name="payment_type" value="all"
                                            checked="checked">
                                        <span class="form-check-label text-gray-600">All</span>
                                    </label>
                                    <!--end::Option-->
                                    @foreach ($transactionTypes as $transactionType)
                                        <!--begin::Option-->
                                        <label
                                            class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                            <input class="form-check-input" type="radio" name="payment_type"
                                                value="{{ $transactionType->id }}">
                                            <span
                                                class="form-check-label text-gray-600">{{ $transactionType->name }}</span>
                                        </label>
                                        <!--end::Option-->
                                    @endforeach
                                </div>
                                <!--end::Options-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2"
                                    data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true"
                                    data-kt-customer-table-filter="filter">Apply</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Menu 1-->
                    <!--end::Filter-->
                    <!--begin::Export-->
                    <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                        data-bs-target="#kt_customers_export_modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2"
                                    rx="1" transform="rotate(90 12.75 4.25)" fill="black"></rect>
                                <path
                                    d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                    fill="black"></path>
                                <path
                                    d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                    fill="#C4C4C4"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Export
                    </button>
                    <!--end::Export-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none"
                    data-kt-customer-table-toolbar="selected">
                    <div class="fw-bolder me-5">
                        <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete
                        Selected</button>
                </div>
                <!--end::Group actions-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-dashed fs-6 gy-5">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>Tanggal Transaksi</th>
                            <th>Batch</th>
                            <th>Nama Barang</th>
                            <th>Stock Awal</th>
                            <th>IN/OUT</th>
                            <th>Stok Sekarang</th>
                            <th>Tipe Transaksi</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listTransaksiStock as $itemStock)
                            <tr>
                                <td>{{ $itemStock->TGL_TRX }}</td>
                                <td>{{ $itemStock->BATCH_CODE }}</td>
                                <td>{{ $itemStock->name }}</td>
                                <td>{{ $itemStock->qty }}</td>
                                <td>{{ $itemStock->TRX_TYPE_ID == 2 ? '(' . $itemStock->qty_change . ')' : $itemStock->qty_change }}
                                </td>
                                <td>{{ $itemStock->qty_current }}</td>
                                <td>{{ $itemStock->TRX_TYPE }}</td>
                                <td>{{ $itemStock->description }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end::Table-->
            </div>
        </div>
    </div>
@endsection

@section('onpage-js')
    {{-- begin::Date Range --}}
    <script>
        // var start = moment().subtract(29, "days");
        // var end = moment();
        var start = moment().subtract(0, "year").startOf("year");
        var end = moment().subtract(0, "year").endOf("year");
        // console.log(moment().subtract(0, "year").startOf("year").format("YYYY-MM-DD"));

        function cb(start, end) {
            $('[name="dateRangePicker"]').html(start.format("YYYY-MM-DD") + "/" + end.format("YYYY-MM-DD"));
        }

        $('[name="dateRangePicker"]').daterangepicker({
            linkedCalendars: false,
            startDate: start,
            endDate: end,
            ranges: {
                // 'Summary': 'all-time',
                "Today": [moment(), moment()],
                "Yesterday": [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf(
                    "month")],
                "This Year": [moment().subtract(0, "year").startOf("year"), moment().subtract(0, "year").endOf(
                    "year")],
                "Last Year": [moment().subtract(1, "year").startOf("year"), moment().subtract(1, "year").endOf(
                    "year")],
            }
        }, cb);

        cb(start, end);

        $("#kt_datepicker_1").flatpickr();
    </script>
    {{-- end::Date Range --}}
@endsection
