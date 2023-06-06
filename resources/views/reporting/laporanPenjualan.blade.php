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
                <h1>Laporan Penjualan</h1>
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
            </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">
                <h1>Riwayat Penjualan</h1>
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
            <!--begin::Table-->
            <table id="kt_datatable_list_transaksi" class="table table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                        <th>No</th>
                        <th>Invoice</th>
                        <th>Tanggal Transaksi</th>
                        <th class="text-center">Jumlah Penjualan</th>
                        <th class="text-center">Detail Invoice</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-bold"></tbody>
            </table>
            <!--end::Table-->
        </div>
    </div>
    {{-- @foreach ($transactionHistory as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>INV-00{{ $item->transaction_id }}</td>
            <td>{{ $item->created_at }}</td>
            <td class="text-center">Rp. {{ number_format($item->total) }}</td>
            <td class="text-center">
                <a href="{{ route('transactionItem.detail', $item->id) }}" class="btn btn-icon btn-primary me-2 mb-2"
                    title="Klik untuk melihat detail invoice">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen005.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path opacity="0.3"
                                d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z"
                                fill="black" />
                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </a>
            </td>
        </tr>
    @endforeach --}}
@endsection

@section('onpage-js')
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('themes/metronic-demo9/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->

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

    <script>
        "use strict";

        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var dt;
            var filterPayment;

            // Private functions
            var initDatatable = function() {
                dt = $("#kt_datatable_list_transaksi").DataTable({
                    processing: true,
                    serverSide: true,
                    filter: true,
                    fnDrawCallback: function() {
                        $('#submit-button').prop('disabled', false);
                    },
                    responsive: {
                        details: {
                            renderer: function(api, rowIdx, columns) {
                                var data = $.map(columns, function(col, i) {
                                    return col.hidden ?
                                        '<div style="background-color: #F5F8FA66; padding: 13px 25px;">' +
                                        '<b>' + col.title + '</b><br/>' +
                                        '<label>' + col.data + '</label>' +
                                        '</div>' :
                                        '';
                                }).join('');

                                return data ?
                                    $(
                                        '<table style="width:100%; border: 1px dashed #E4E6EF; border-radius: 6px;"/>'
                                    )
                                    .append(data) :
                                    false;
                            }
                        }
                    },
                    filter: true,
                    fnDrawCallback: function() {
                        $('#submit-button').prop('disabled', false);
                    },
                    ajax: {
                        url: "{{ route('reporting.laporanPenjualan') }}",
                    },
                    columns: [{
                            data: null,
                            sortable: false,
                            render: function(data, type, row, meta) {
                                // console.log(row.id + row.long_name)
                                return meta.row + meta.settings._iDisplayStart + 1;
                            },
                            sClass: "text-center"
                        },
                        {
                            data: 'invoice'
                        },
                        {
                            data: 'created_at'
                        },
                        {
                            data: 'jumlah_penjualan'
                        },
                        {
                            data: 'action'
                        }
                    ]
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    KTMenu.createInstances();
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = function() {
                const filterSearch = document.querySelector('[data-kt-table-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    dt.search(e.target.value).draw();
                });
            }

            // Filter Datatable
            var handleFilterDatatable = () => {
                // Select filter options

                // const filterTanggal = $("input[name=filterTanggal]").text();

                filterPayment = document.querySelectorAll(
                    '[data-kt-table-filter="jenis_transaksi"] [name="jenis_transaksi"]');
                const filterButton = document.querySelector('[data-kt-table-filter="filter"]');

                // Filter datatable on submit
                filterButton.addEventListener('click', function() {
                    // Get filter values
                    let paymentValue = '';

                    // Get payment value
                    filterPayment.forEach(r => {
                        if (r.checked) {
                            paymentValue = r.value;
                        }

                        // Reset payment value if "All" is selected
                        if (paymentValue === 'All') {
                            paymentValue = '';
                        }
                    });

                    // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
                    dt.search(paymentValue).draw();
                });
            }

            // Reset Filter
            var handleResetForm = () => {
                // Select reset button
                const resetButton = document.querySelector('[data-kt-table-filter="reset"]');

                // Reset datatable
                resetButton.addEventListener('click', function() {
                    // Reset payment type
                    filterPayment[0].checked = true;

                    // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                    dt.search('').draw();
                });
            }

            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                    handleFilterDatatable();
                    handleResetForm();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    </script>
@endsection
