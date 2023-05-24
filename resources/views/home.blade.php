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
                <h1>Laporan</h1>
            </div>
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Add customer-->
                    <h3><a href="{{ route('transactionItem.history') }}" class="">Lihat semua ></a></h3>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        {{-- <div class="card-header">
            <div class="card-title">
                <div class="py-5">
                    <label class="form-label">Periode</label>
                    <input class="form-control form-control-solid position-relative w-200px" placeholder="Pick date rage"
                        name="dateRangePicker" id="dateRangePickerAttendance">
                </div>
            </div>
        </div> --}}
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="shadow-sm p-3 bg-white rounded">
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2 p-5">
                                <span class="fw-bold d-block fs-5">Penjualan {{ date('M Y') }} </span>
                                <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">Rp.
                                    {{ number_format($dataTransaksiBulanIni[0]->TOTAL_PENJUALAN) }}</a>
                                {{-- <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">Rp. 200.000</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="shadow-sm p-3 bg-white rounded">
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2 p-5">
                                <span class="fw-bold d-block fs-5">Penjualan Hari Ini</span>
                                <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">Rp.
                                    {{ number_format($dataTransaksiHariIni[0]->TOTAL_PENJUALAN) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="shadow-sm p-3 bg-white rounded">
                        <div class="d-flex align-items-center flex-row-fluid flex-wrap">
                            <div class="flex-grow-1 me-2 p-5">
                                <span class="fw-bold d-block fs-5">Produk terjual hari ini</span>
                                <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder">
                                    {{ number_format($totalStockKeluar) }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-10">
                    <a href="{{ route('transactionItem.index') }}" class="btn btn-primary w-100 btn-lg">Tambah Transaksi</a>
                </div>
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

        $('[name="yearPicker"]').datepicker({
            autoclose: true,
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
    {{-- end::Date Range --}}
@endsection
