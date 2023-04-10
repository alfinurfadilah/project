@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('transactionItem.outPay') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Informasi Penjualan
                            </div>

                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                                    <!--begin::Add customer-->
                                    <button type="button" class="btn btn-sm btn-primary w-100" data-bs-toggle="modal"
                                        data-bs-target="#modalPilihBarang">
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
                                        PILIH BARANG
                                    </button>
                                    <!--end::Add customer-->
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Card toolbar-->

                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <label class="fw-bold fs-5">Tanggal Transaksi :</label>
                                </div>
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
                                        <input class="form-control flatpickr-input active fw-200" placeholder="Pick date"
                                            id="kt_datepicker_2" type="text" readonly="readonly" name="tanggalTransaksi">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="separator mb-10"></div>

                        <div class="card-body">
                            @php
                                $totalItem = count($cart_data);
                            @endphp

                            <div class="row mb-10">
                                <label for="totalItem" class="fw-bold fs-4">Total {{ $totalItem }} Items</label>
                            </div>
                            @php
                                // menghitung total harga modal dan keuntungan
                                $totalHargaModal = 0;
                            @endphp

                            @forelse($cart_data as $index=>$item)
                                @php
                                    // menghitung total harga modal dan keuntungan
                                    $totalHargaModal = $totalHargaModal + $item['associatedModel']->harga_modal * $item['qty'];
                                @endphp

                                <div class="row">
                                    <div class="row mb-5">
                                        <div class="col-8">
                                            <label for="detailBarang" class="text-muted">Detail Barang</label>
                                        </div>
                                        <div class="col-4 text-center">
                                            <label for="qty" class="text-muted">Qty</label>
                                        </div>
                                    </div>

                                    <div class="row mb-5 d-flex align-content-center flex-wrap">
                                        <div class="col-8">
                                            <label for="namaBarang"
                                                class="fs-5 mb-2">{{ Str::words($item['name'], 3) }}</label><br>
                                            <label for="hargaBarang" class="text-muted fs-8">Rp.
                                                {{ number_format($item['pricesingle'], 2, ',', '.') }}</label>
                                        </div>
                                        <div class="col-4">
                                            <div class="row">
                                                <div class="col">

                                                    <form action="{{ route('transaction.decrease', $item['rowId']) }}"
                                                        method="POST" style='display:inline;'>
                                                        @csrf
                                                        <!--begin::Decrease control-->
                                                        <button type="submit"
                                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary rounded-circle"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">

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
                                                    </form>
                                                </div>
                                                <div class="col py-2 text-center">
                                                    <label for="qty">{{ $item['qty'] }}</label>
                                                </div>
                                                <div class="col">
                                                    <form action="{{ route('transaction.increase', $item['rowId']) }}"
                                                        method="POST" style='display:inline;'>
                                                        @csrf
                                                        <!--begin::Increase control-->
                                                        <button type="submit"
                                                            class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary rounded-circle"
                                                            data-kt-menu-trigger="click"
                                                            data-kt-menu-placement="bottom-end">

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
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-5">
                                        <div class="col-8">
                                            <label for="jumlah" class="text-muted fs-5">Jumlah</label>
                                        </div>
                                        <div class="col-4 text-center">
                                            <label for="jumlahHarga" class="fs-5">Rp
                                                {{ number_format($item['price'], 2, ',', '.') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator mb-10"></div>
                            @empty
                                <div class="row">
                                    <div class="text-center">
                                        Tidak ada barang di pilih
                                    </div>
                                </div>
                            @endforelse

                        </div>

                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col">
                                    <label class="fw-bold text-muted fs-5">Total Harga Modal</label>
                                </div>
                                <div class="col d-flex d-flex justify-content-end">
                                    <label class="fw-bold fs-5">Rp.
                                        {{ number_format($totalHargaModal, 2, ',', '.') }}</label>
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col">
                                    <label class="fw-bold text-muted fs-5">Keuntungan</label>
                                </div>
                                <div class="col d-flex d-flex justify-content-end">
                                    <label class="fw-bold fs-5">Rp.
                                        {{ number_format($data_total['sub_total'] - $totalHargaModal, 2, ',', '.') }}</label>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col">
                                    <label class="fw-bold text-muted fs-5">Total Harga Jual</label>
                                </div>
                                <div class="col d-flex d-flex justify-content-end">
                                    <label class="fw-bold fs-5">Rp.
                                        {{ number_format($data_total['sub_total'], 2, ',', '.') }}</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <label class="form-label text-muted" for="description">Catatan / Keterangan</label>
                                    <textarea name="description" cols="30" rows="10" class="form-control form-control-solid">{{ old('description') }}</textarea>
                                    @include('layouts.error', ['name' => 'description'])
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex d-flex justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fullHeightModalRight">Bayar</button> --}}
                            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                        </div>

                        <input id="totalHidden" type="hidden" name="totalHidden" value="{{ $data_total['total'] }}" />

                    </div>
                </div>
            </div>
        </form>

        <div class="modal fade" tabindex="-1" id="modalPilihBarang">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Barang</h5>

                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                            aria-label="Close">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                            <span class="svg-icon svg-icon-2x">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </div>
                        <!--end::Close-->
                    </div>

                    <div class="modal-body">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-bordered fs-6 gy-5 text-start">
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-sm-center">
                                                <!--begin::Symbol-->
                                                <div class="symbol symbol-60px symbol-2by2 me-4">
                                                    <div class="symbol-label"
                                                        style="background-image: url('{{ $product->image ? asset($product->image) : asset('themes/metronic-demo9/media/illustrations/dozzy-1/13.png') }}')">
                                                    </div>
                                                </div>
                                                <!--end::Symbol-->
                                                <!--begin::Content-->
                                                <div
                                                    class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                                                    <!--begin::Title-->
                                                    <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                                        <a href="#"
                                                            class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ Str::words($product->name, 6) }}</a>
                                                    </div>
                                                    <!--end::Title-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                        </td>
                                        <td class="fw-bolder">{{ number_format($product->harga_jual) }}</td>
                                        <td>
                                            <form action="{{ route('transaction.addCart', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @if ($product->qty == 0)
                                                    <button type="button"
                                                        class="btn btn-sm btn-icon btn-color-muted btn-active-light-muted rounded-circle"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

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
                                                @else
                                                    <button type="submit"
                                                        class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary rounded-circle"
                                                        data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">

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
                                                @endif
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>{{ $products->links() }}</div>
                        <!--end::Table-->
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="modal bg-white fade right" tabindex="-1" id="fullHeightModalRight" aria-labelledby="myModalLabel" role="dialog">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content shadow-none">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
        
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>
        
                    <div class="modal-body">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th width="60%">Sub Total</th>
                                <th width="40%" class="text-right">Rp.
                                    {{ number_format($data_total['sub_total'],2,',','.') }} </th>
                            </tr>
                            @if ($data_total['tax'] > 0)
                            <tr>
                                <th>PPN 10%</th>
                                <th class="text-right">Rp.
                                    {{ number_format($data_total['tax'],2,',','.') }}</th>
                            </tr>
                            @endif
                        </table>
                        <form action="{{ route('transaction.pay') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="oke">Input Nominal</label>
                            <input id="oke" class="form-control" type="number" name="bayar" autofocus />
                        </div>
                        <h3 class="font-weight-bold">Total:</h3>
                        <h1 class="font-weight-bold mb-5">Rp. {{ number_format($data_total['total'],2,',','.') }}</h1>
                        <input id="totalHidden" type="hidden" name="totalHidden" value="{{$data_total['total']}}" />
        
                        <h3 class="font-weight-bold">Bayar:</h3>
                        <h1 class="font-weight-bold mb-5" id="pembayaran"></h1>
        
                        <h3 class="font-weight-bold text-primary">Kembalian:</h3>
                        <h1 class="font-weight-bold text-primary" id="kembalian"></h1>
                    </div>
        
                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveButton" disabled onClick="openWindowReload(this)">Save transcation</button>
                    </div>
                </div>
            </div>
        </div> --}}

    </div>
@endsection
<!-- © 2020 Copyright: Tahu Coding -->
<!-- Ini error harusnya bisa dinamis ambil value dari controller tp agar cepet ya biar aja gini silahkan modifikasi  -->
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @if (Session::has('error'))
        <script>
            toastr.error(Session('error'))
        </script>
    @endif

    @if (Session::has('errorTransaksi'))
        <script>
            toastr.error(Session('errorTransaksi'))
        </script>
    @endif

    @if (Session::has('success'))
        <script>
            toastr.success(Session('success'))
        </script>
    @endif

    <script>
        $(document).ready(function() {
            $("#kt_datepicker_2").flatpickr({
                dateFormat: "d F Y",
                defaultDate: "today"
            });
            $('#fullHeightModalRight').on('shown.bs.modal', function() {
                $('#oke').trigger('focus');
            });
        });

        oke.oninput = function() {
            let jumlah = parseInt(document.getElementById('totalHidden').value) ? parseInt(document.getElementById(
                'totalHidden').value) : 0;
            let bayar = parseInt(document.getElementById('oke').value) ? parseInt(document.getElementById('oke')
                .value) : 0;
            let hasil = bayar - jumlah;
            document.getElementById("pembayaran").innerHTML = bayar ? 'Rp ' + rupiah(bayar) + ',00' : 'Rp ' + 0 +
                ',00';
            document.getElementById("kembalian").innerHTML = hasil ? 'Rp ' + rupiah(hasil) + ',00' : 'Rp ' + 0 +
                ',00';

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
    </script>

@endpush

@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <style>
        .gambar {
            width: 100%;
            height: 175px;
            padding: 0.9rem 0.9rem
        }

        @media only screen and (max-width: 600px) {
            .gambar {
                width: 100%;
                height: 100%;
                padding: 0.9rem 0.9rem
            }
        }

        html {
            overflow: scroll;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 0px;
            /* Remove scrollbar space */
            background: transparent;
            /* Optional: just make scrollbar invisible */
        }

        /* Optional: show position indicator in red */
        ::-webkit-scrollbar-thumb {
            background: #FF0000;
        }

        .cart-btn {
            position: absolute;
            display: block;
            top: 5%;
            right: 5%;
            cursor: pointer;
            transition: all 0.3s linear;
            padding: 0.6rem 0.8rem !important;

        }

        .productCard {
            cursor: pointer;

        }

        .productCard:hover {
            border: solid 1px rgb(172, 172, 172);

        }
    </style>
    <!-- © 2020 Copyright: Tahu Coding -->
@endpush
