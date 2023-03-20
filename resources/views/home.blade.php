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
            <div class="py-5">
                <label class="form-label">Periode</label>
                <input class="form-control form-control-solid position-relative w-200px" placeholder="Pick date rage" name="dateRangePicker" id="dateRangePickerAttendance">
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                        <div class="flex-grow-1 me-2 p-5">
                            <span class="fw-bold d-block fs-5">Total Penjualan</span>
                            {{-- <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">Rp. {{ number_format($totalPenjualan) }}</a> --}}
                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">Rp. 200.000</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                        <div class="flex-grow-1 me-2 p-5">
                            <span class="fw-bold d-block fs-5">Total Pengeluaran</span>
                            {{-- <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">Rp. {{ number_format($totalPengeluaran) }}</a> --}}
                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">Rp. 200.000</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                    <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                        <div class="flex-grow-1 me-2 p-5">
                            <span class="fw-bold d-block fs-5">Total Keuntungan Penjualan</span>
                            {{-- <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">Rp. {{ number_format($totalKeuntungan) }}</a> --}}
                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">Rp. 200.000</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-7">
                <div class="row">
                    <div class="shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="p-10">
                            <span class="fw-bolder d-block fs-3 mb-5">Riwayat Transaksi</span>
                            <table class="table table-sm">
                                <tr>
                                    <th>Invoice</th>
                                    <th>Tanggal Transaksi</th>
                                    <th class="text-center">Detail Invoice</th>
                                </tr>
                                {{-- @foreach ($riwayatTransaksi as $index=>$item)
                                    <tr>
                                        <td class="fw-bolder">{{$item->invoices_number}}</td>
                                        <td class="fw-bolder">{{$item->created_at}}</td>
                                        <td class="text-center">
                                            <a href="{{route('transaction.laporan', $item->invoices_number )}}" class="btn btn-icon btn-primary me-2 mb-2" title="Klik untuk melihat detail invoice">
                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen005.svg-->
                                                <span class="svg-icon svg-icon-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z" fill="black"/>
                                                        <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach                         --}}
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2 p-5">
                                <span class="fw-bold d-block fs-5">Total Penjualan</span>
                                <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">Rp. 200.000</a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="col-5">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex flex-stack mb-5">
                            <!--begin::Title-->
                            <h4 class="fw-bolder text-gray-800 fs-3 m-0">Stok Barang</h4>
                            <!--end::Title-->
                            <!--begin::Menu-->
                            <div class="mb-0">
                                <input class="form-control form-control-solid position-relative w-200px" placeholder="Pick date rage" name="dateRangePicker" id="dateRangePickerAttendance">
                            </div>
                            <!--end::Menu-->
                        </div>
                        <div class="table-responsive">
                            <!--begin::Table-->
                            <table class="table align-middle table-row-bordered fs-6 gy-5 text-start">
                                <thead>
                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                        <th>Nama Barang</th>
                                        <th class="text-end">Stok</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-sm-center">
                                                <!--begin::Content-->
                                                <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                                                    <!--begin::Title-->
                                                    <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                                        <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ Str::words($product->name,6) }}</a>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                        </td>
                                        <td class="text-end">
                                            @php
                                                if ($product->qty <= 10) {
                                                    echo '<label class="fw-bold text-danger">'. number_format($product->qty) .'<i class="fas fa-exclamation-circle ms-1 fs-7 text-danger" data-bs-toggle="tooltip" title="" data-bs-original-title="Stok hampir habis" aria-label="Phone number must be active"></i></label>';
                                                } else {
                                                    echo '<label class="fw-bold text-primary">'. number_format($product->qty) .'<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Stok aman" aria-label="Phone number must be active"></i></label>';
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                    @endforeach --}}
                                </tbody>
                                <tfoot>
                                    <tr class="text-center">
                                        <td colspan="2">
                                            {{-- <a href="{{ route('products.index') }}" class="btn btn-lg btn-flex btn-link btn-color-primary btn-block">Lihat Semua Barang</a> --}}
                                            <a href="#" class="btn btn-lg btn-flex btn-link btn-color-primary btn-block">Lihat Semua Barang</a>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            <!--end::Table-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('onpage-js')
    {{-- begin::Date Range--}}
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
            "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
            "This Year": [moment().subtract(0, "year").startOf("year"), moment().subtract(0, "year").endOf("year")],
            "Last Year": [moment().subtract(1, "year").startOf("year"), moment().subtract(1, "year").endOf("year")],
            }
        }, cb);

        cb(start, end);

        $('[name="yearPicker"]').datepicker({
            autoclose: true,
            format: "yyyy",
            viewMode: "years", 
            minViewMode: "years"
        });
    </script>
    {{-- end::Date Range --}}
@endsection
