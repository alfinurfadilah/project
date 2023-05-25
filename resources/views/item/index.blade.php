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
                    <a href="{{ route('item.create') }}" class="btn btn-primary">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr087.svg-->
                        <span class="svg-icon svg-icon-muted svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="11" y="18" width="12" height="2"
                                    rx="1" transform="rotate(-90 11 18)" fill="black" />
                                <rect x="6" y="11" width="12" height="2" rx="1"
                                    fill="black" />
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
            @if (Session::has('success'))
                @include('layouts.flash-success', ['message' => Session('success')])
            @endif
            <!--begin::Row-->
            <div class="row">
                <div class="col mb-5">
                    <!--begin::Search-->
                    <form action="{{ route('item.index') }}" method="get">
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" name="search" class="form-control form-control-solid w-250px ps-15"
                                placeholder="Cari Barang" onblur="this.form.submit()">
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
                                <th class="align-middle">Nama Barang</th>
                                <th class="align-middle">Kategori</th>
                                <th class="align-middle">Jenis</th>
                                <th class="align-middle">Satuan</th>
                                {{-- <th class="align-top">Stok</th>
                                <th class="align-top">Harga Jual</th>
                                <th class="align-top">Harga Harga Modal</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="align-middle">
                                        <div class="d-flex align-items-sm-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-60px symbol-2by2 me-4">
                                                <div class="symbol-label"
                                                    style="background-image: url('{{ $item->img_url ?? asset('themes/metronic-demo9/media/illustrations/dozzy-1/13.png') }}')">
                                                </div>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Content-->
                                            <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                                                <!--begin::Title-->
                                                <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                                    <a href="#"
                                                        class="text-gray-800 fw-bolder text-hover-primary fs-6">{{ Str::words($item->name, 6) }}</a>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </td>
                                    <td class="align-middle">{{ $item->itemCategories->name }}</td>
                                    <td class="align-middle">{{ $item->itemType->name }}</td>
                                    <td class="align-middle">{{ $item->uom->uom_name }}</td>
                                    {{-- <td class="align-top">
                                @php
                                    foreach (@$item->itemStock as $key => $value) {
                                        if ($value->itemQty->qty <= 10) {
                                            echo '<div class="me-3"><div class="d-flex align-items-center"><div class="text-gray-800 fw-bolder">Batch ID : '. $value->batch_stock .'</div></div><div class="text-danger">Stok : '. number_format($value->itemQty->id) .'<i class="fas fa-exclamation-circle ms-1 fs-7 text-danger" data-bs-toggle="tooltip" title="" data-bs-original-title="Stok hampir habis" aria-label="Phone number must be active"></i></div></div>';
                                        } else {
                                            echo '<div class="me-3"><div class="d-flex align-items-center"><div class="text-gray-800 fw-bolder">Batch ID : '. $value->batch_stock .'</div></div><div class="text-primary">Stok : '. number_format($value->itemQty->id) .'<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Stok aman" aria-label="Phone number must be active"></i></div></div>';
                                        }
                                    }
                                @endphp
                            </td>
                            <td class="align-top">
                                @php
                                    foreach (@$item->itemStock as $key => $value) {
                                        echo '<div class="me-3"><div class="d-flex align-items-center"><div class="text-gray-800 fw-bolder">Batch ID : '. $value->batch_stock .'</div></div><div class="text-bold">Harga : '. number_format($value->itemPrice->id) .'</div></div>';
                                    }
                                @endphp
                            </td>
                            <td class="align-top">
                                @php
                                    foreach (@$item->itemStock as $key => $value) {
                                        echo '<div class="me-3"><div class="d-flex align-items-center"><div class="text-gray-800 fw-bolder">Batch ID : '. $value->batch_stock .'</div></div><div class="text-bold">Harga : '. number_format($value->itemPrice->id) .'</div></div>';
                                    }
                                @endphp
                            </td> --}}
                                    <!--begin::Action=-->
                                    <td class="align-middle">
                                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary"
                                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->
                                        </a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                            data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('item.show', $item->id) }}"
                                                    class="menu-link px-3">Detail</a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('item.edit', $item->id) }}"
                                                    class="menu-link px-3">Edit</a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="{{ route('item.showAturStock', $item->id) }}"
                                                    class="menu-link px-3">Atur Stok/Harga</a>
                                            </div>
                                            <!--end::Menu item-->

                                            <!--begin::Delete button-->
                                            <form action="{{ route('item.delete', $item->id) }}" method="POST"
                                                id="deleteitemCategory{{ $item->id }}">
                                                @method('delete')
                                                @csrf
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <a onclick="onDelete({{ $item->id }}, '{{ $item->name }}')"
                                                        class="menu-link px-3">Hapus</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </form>
                                            <!--end::Delete button-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Row-->
            <div>{{ $items->links('pagination::bootstrap-4') }}</div>
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

@section('onpage-js')
    <script>
        function onDelete(id, name) {
            Swal.fire({
                html: 'Are you sure delete <strong>' + name + '</strong> ?',
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ok, got it!",
                cancelButtonText: 'Nope, cancel it',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then(function(isConfirm) {

                // IF User Choose Cancel
                if (!isConfirm.isConfirmed) return;

                document.getElementById('deleteitemCategory' + id).submit();

            });
        }
    </script>
@endsection
