@extends('layouts.app')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            <h4>Semua Barang</h4>
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                <!--begin::Add customer-->
                <a href="{{ route('item.create')}}" class="btn btn-primary">
                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr087.svg-->
                    <span class="svg-icon svg-icon-muted svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black"/>
                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black"/>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    Tambah Barang
                </a>
                <!--end::Add customer-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-5">
        @if(Session::has('success'))
            @include('layouts.flash-success',[ 'message'=> Session('success') ])
        @endif
        <!--begin::Row-->
        <div class="row">
            <div class="col mb-5">
                <!--begin::Search-->
                <form action="{{ route('item.index') }}" method="get">
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" name="search" class="form-control form-control-solid w-250px ps-15" placeholder="Cari Barang" onblur="this.form.submit()">
                    </div>
                </form>
                <!--end::Search-->
            </div>
        </div>
        <div class="row g-10">
            <div class="table-responsive">
                <!--begin::Table-->
                <table class="table align-middle table-row-bordered fs-6 gy-5 text-start">
                    <thead>
                        <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Harga Jual</th>
                            <th>Harga Harga Modal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="d-flex align-items-sm-center">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-60px symbol-2by2 me-4">
                                        <div class="symbol-label" style="background-image: url('{{ $item->img_url ?? asset('themes/metronic-demo9/media/illustrations/dozzy-1/13.png') }}')"></div>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Content-->
                                    <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                                        <!--begin::Title-->
                                        <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                            <a href="#" class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ Str::words($item->name,6) }}</a>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center">
                                            <div class="me-4">
                                                <a href="{{ route('item.edit', $item->id) }}" class="btn btn-icon btn-secondary btn-sm">
                                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen055.svg-->
                                                    <span class="svg-icon svg-icon-muted svg-icon-1x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M2 4.63158C2 3.1782 3.1782 2 4.63158 2H13.47C14.0155 2 14.278 2.66919 13.8778 3.04006L12.4556 4.35821C11.9009 4.87228 11.1726 5.15789 10.4163 5.15789H7.1579C6.05333 5.15789 5.15789 6.05333 5.15789 7.1579V16.8421C5.15789 17.9467 6.05333 18.8421 7.1579 18.8421H16.8421C17.9467 18.8421 18.8421 17.9467 18.8421 16.8421V13.7518C18.8421 12.927 19.1817 12.1387 19.7809 11.572L20.9878 10.4308C21.3703 10.0691 22 10.3403 22 10.8668V19.3684C22 20.8218 20.8218 22 19.3684 22H4.63158C3.1782 22 2 20.8218 2 19.3684V4.63158Z" fill="black"/>
                                                            <path d="M10.9256 11.1882C10.5351 10.7977 10.5351 10.1645 10.9256 9.77397L18.0669 2.6327C18.8479 1.85165 20.1143 1.85165 20.8953 2.6327L21.3665 3.10391C22.1476 3.88496 22.1476 5.15129 21.3665 5.93234L14.2252 13.0736C13.8347 13.4641 13.2016 13.4641 12.811 13.0736L10.9256 11.1882Z" fill="black"/>
                                                            <path d="M8.82343 12.0064L8.08852 14.3348C7.8655 15.0414 8.46151 15.7366 9.19388 15.6242L11.8974 15.2092C12.4642 15.1222 12.6916 14.4278 12.2861 14.0223L9.98595 11.7221C9.61452 11.3507 8.98154 11.5055 8.82343 12.0064Z" fill="black"/>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </a>
                                            </div>

                                            <!--begin::Delete button-->
                                            <form action="{{ route('item.delete', $item->id ) }}" method="POST">
                                                @method('delete')
                                                @csrf
                                                <!--begin::Toolbar-->
                                                <button onclick="return confirm('Apakah anda yakin menghapus data ini ?');" class="btn btn-icon btn-secondary btn-sm">
                                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/general/gen027.svg-->
                                                    <span class="svg-icon svg-icon-muted svg-icon-1x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"/>
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"/>
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"/>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </button>
                                                <!--end::Toolbar-->
                                            </form>
                                            <!--end::Delete button-->
                                        </div>
                                        <!--end::Section-->
                                    </div>
                                    <!--end::Content-->
                                </div>
                            </td>
                            {{-- <td>{{ $item->itemCategories->name}}</td> --}}
                            {{-- <td>{{ $item->itemType->name}}</td> --}}
                            <td>
                                {{-- @php
                                    if ($item->itemQty) {
                                        if ($item->itemQty->qty <= 10) {
                                            echo '<label class="fw-bold text-danger">'. number_format($item->itemQty->qty) .'<i class="fas fa-exclamation-circle ms-1 fs-7 text-danger" data-bs-toggle="tooltip" title="" data-bs-original-title="Stok hampir habis" aria-label="Phone number must be active"></i></label>';
                                        } else {
                                            echo '<label class="fw-bold text-primary">'. number_format($item->itemQty->qty) .'<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Stok aman" aria-label="Phone number must be active"></i></label>';
                                        }
                                    }
                                @endphp --}}
                            </td>
                            {{-- <td class="fw-bolder">{{ number_format(@$item->itemPrice->sell_price) }}</td>
                            <td>{{ number_format(@$item->itemPrice->buy_price) }}</td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end::Table-->
            </div>
        </div>
        <!--end::Row-->
        <div>{{ $items->links() }}</div>
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
@endsection

@push('style')
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

</style>
@endpush