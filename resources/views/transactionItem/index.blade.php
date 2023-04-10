@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="card py-5">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                        <li class="nav-item">
                            <a class="nav-link fw-bolder fs-2 active" data-bs-toggle="tab" href="#kt_tab_pane_1">In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fw-bolder fs-2" data-bs-toggle="tab" href="#kt_tab_pane_2">Out</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                            <div class="card mt-5" style="min-height: 85vh">
                                <div class="card-header bg-white">
                                    <div class="card-title">
                                        <h4 class="font-weight-bold">Riwayat Transaksi In</h4>
                                    </div>
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                            <!--begin::Add customer-->
                                            <a href="{{ route('transactionItem.in') }}" class="btn btn-primary">
                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr087.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="11" y="18" width="12"
                                                            height="2" rx="1" transform="rotate(-90 11 18)"
                                                            fill="black" />
                                                        <rect x="6" y="11" width="12" height="2"
                                                            rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                Tambah Penjualan
                                            </a>
                                            <!--end::Add customer-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <tr>
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Tanggal Transaksi</th>
                                            <th class="text-center">Jumlah Penjualan</th>
                                            <th class="text-center">Detail Invoice</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                            <div class="card mt-5" style="min-height: 85vh">
                                <div class="card-header bg-white">
                                    <div class="card-title">
                                        <h4 class="font-weight-bold">Riwayat Transaksi Out</h4>
                                    </div>
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar">
                                        <!--begin::Toolbar-->
                                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                            <!--begin::Add customer-->
                                            <a href="{{ route('transactionItem.out') }}" class="btn btn-primary">
                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr087.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="11" y="18" width="12"
                                                            height="2" rx="1" transform="rotate(-90 11 18)"
                                                            fill="black" />
                                                        <rect x="6" y="11" width="12" height="2"
                                                            rx="1" fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                                Tambah Pengeluaran
                                            </a>
                                            <!--end::Add customer-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <div class="card-body">
                                    <table class="table table-sm">
                                        <tr>
                                            <th>No</th>
                                            <th>Invoice</th>
                                            <th>Tanggal Transaksi</th>
                                            <th class="text-center">Jumlah Pengeluaran</th>
                                            <th class="text-center">Detail Invoice</th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('onpage-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @if (Session::has('error'))
        <script>
            toastr.error(
                'Telah mencapai jumlah maximum Product | Silahkan tambah stock Product terlebih dahulu untuk menambahkan'
            )
        </script>
    @endif

    @if (Session::has('errorTransaksi'))
        <script>
            toastr.error(
                'Transaksi tidak valid | perhatikan jumlah pembayaran | cek jumlah product'
            )
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            toastr.success(
                'Transaksi berhasil'
            )
        </script>
    @endif
@endsection
