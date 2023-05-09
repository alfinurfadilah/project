@extends('layouts.app')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <div class="card">
                    <div id="printArea">
                        <div class="card-header">
                            <div class="card-title">
                                <h1 class="fw-bolder">
                                    Detail Transaksi
                                </h1>
                            </div>
                            <div class="card-toolbar">
                                <img alt="Logo" src="{{ asset('img/logo-new.png') }}" />
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between bd-highlight mb-10">
                                <div class="p-2 bd-highlight">
                                    <h3 class="fs-3 text-gray-600">#INV-00{{ $transactionHistory->transaction_id }}</h3>
                                </div>
                                <div class="p-2 bd-highlight">
                                    <h3 class="fs-3 text-gray-600">Alamat Toko</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10 border-end border-gray-200">
                                    <table class="table gs-7 gy-7 gx-7">
                                        <thead>
                                            <tr class="fw-bold fs-6 text-muted border-bottom border-gray-200">
                                                <th>Nama Barang</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center">Harga Satuan</th>
                                                <th class="text-center">Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transactionItem as $dataTransactionItem)
                                                <tr>
                                                    <td>{{ $dataTransactionItem->item->name }}</td>
                                                    <td class="text-center">
                                                        {{ $dataTransactionItem->qty }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $dataTransactionItem->item->itemStock[0]->itemPrice->price }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $dataTransactionItem->item->itemStock[0]->itemPrice->price * $dataTransactionItem->qty }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-center fw-bolder">Sub Total</td>
                                                <td class="text-center">{{ $transactionHistory->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-2">
                                    <div class="col text-end border-bottom pb-5">
                                        <label class="fs-5 text-muted">Total</label>
                                        <h1 class="fw-bolder">Rp.{{ number_format($transactionHistory->total) }}</h1>
                                        <label class="subtitle text-muted">Sudah Termasuk Pajak</label>
                                    </div>
                                    <div class="col text-end border-bottom py-5">
                                        <label class="fs-5 text-muted">Invoice kepada</label>
                                        <br>
                                        <label class="fs-5">(Nama Customer)</label>
                                    </div>
                                    <div class="col text-end border-bottom py-5">
                                        <label class="fs-5 text-muted">Nomor Invoice</label>
                                        <br>
                                        <label class="fs-5">{{ $transactionHistory->invoices_number }}</label>
                                    </div>
                                    <div class="col text-end border-bottom py-5">
                                        <label class="fs-5 text-muted">Tanggal</label>
                                        <br>
                                        <label class="fs-5">{{ $transactionHistory->transaction_date }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" onclick="window.print()">
                            <i class="fas fa-print fs-2"></i>
                            Print Invoice
                        </button>
                        <button type="button" class="btn btn-primary">
                            <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr044.svg-->
                            <span class="svg-icon svg-icon-muted svg-icon-1hx">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M21 22H3C2.4 22 2 21.6 2 21C2 20.4 2.4 20 3 20H21C21.6 20 22 20.4 22 21C22 21.6 21.6 22 21 22ZM13 13.4V3C13 2.4 12.6 2 12 2C11.4 2 11 2.4 11 3V13.4H13Z"
                                        fill="black" />
                                    <path opacity="0.3" d="M7 13.4H17L12.7 17.7C12.3 18.1 11.7 18.1 11.3 17.7L7 13.4Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            Unduh Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="row">
        <div class="col">
            <div class="card" style="min-height: 85vh">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col"><h4 class="font-weight-bold">Report / Laporan Transaksi</h4></div>
                    <div class="col"><a class="btn btn-primary float-right btn-sm" onclick="window.print()"><i class="fas fa-print"></i> Print</a>
                        <a href="{{ URL::previous() }}" class="btn btn-success float-right btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    </div>                 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                              <table width="100%" class="table table-borderless">
                                <tr>
                                    <td width="38%" class="font-weight-bold">Invoices Number</td>
                                    <td width="2%" class="font-weight-bold">:</td>
                                    <td width="60%" class="font-weight-bold">{{$transactionHistory->invoices_number}}</td>
                                </tr>
                                <tr>
                                    <td width="38%">Admin</td>
                                    <td width="2%">:</td>
                                    <td width="60%">{{$transactionHistory->user->name}}</td>
                                </tr>
                                <tr>
                                    <td width="38%">Create At</td>
                                    <td width="2%">:</td>
                                    <td width="60%">{{$transactionHistory->created_at}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-6">
                            <table width="100%" class="table table-borderless">
                                <tr>
                                    <td width="38%">Pay</td>
                                    <td width="2%">:</td>
                                    <td width="60%">{{$transactionHistory->pay}}</td>
                                </tr>
                                <tr>
                                    <td width="38%">Total</td>
                                    <td width="2%">:</td>
                                    <td width="60%">{{$transactionHistory->total}}</td>
                                </tr>   
                                <tr>
                                    <td width="38%">Customer</td>
                                    <td width="2%">:</td>
                                    <td width="60%">Take Away Customer</td>
                                </tr>                   
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-striped table-sm" width="100%">
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach ($transactionHistory->productTranscation as $index => $item)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->qty}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>                               
                            </table>
                        </div>
                    </div>                  
                </div>
            </div>
    </div> --}}
        {{-- </div> --}}
    </div>
@endsection
@section('onpage-js')
    <script>
        function PrintElem(elem) {
            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

            mywindow.document.write(document.getElementById(elem).innerHTML);

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10*/

            mywindow.print();
            mywindow.close();

            return true;
        }
    </script>
@endsection
