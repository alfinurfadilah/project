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
                                <td>{{ $itemStock->qty_change }}</td>
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

        $('[name="yearPicker"]').datepicker({
            autoclose: true,
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>
    {{-- end::Date Range --}}
@endsection
