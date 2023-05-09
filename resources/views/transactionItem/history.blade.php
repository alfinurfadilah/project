@extends('layouts.app')

@section('content')
    <!--begin::Card body-->
    <div class="card mt-5" style="min-height: 85vh">
        <div class="card-header bg-white">
            <div class="card-title">
                <h4 class="font-weight-bold">Riwayat Penjualan</h4>
            </div>
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
                @foreach ($transactionHistory as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>INV-00{{ $item->transaction_id }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td class="text-center">Rp. {{ number_format($item->total) }}</td>
                        <td class="text-center">
                            <a href="{{ route('transactionItem.detail', $item->id) }}"
                                class="btn btn-icon btn-primary me-2 mb-2" title="Klik untuk melihat detail invoice">
                                <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen005.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
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
                @endforeach
            </table>
            <div>{{ $transactionHistory->links() }}</div>
        </div>
    </div>
    <!--end::Card body-->
@endsection
