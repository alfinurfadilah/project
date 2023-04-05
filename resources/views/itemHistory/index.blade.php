@extends('layouts.app')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
<!--begin::Card-->
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <form action="{{ route('itemHistory.index') }}" method="get">
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
        <!--begin::Card title-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-5">
        @if(Session::has('success'))
            @include('layouts.flash-success',[ 'message'=> Session('success') ])
        @endif
        <!--begin::Row-->
        <div class="row g-10">

            <div class="card mt-5">
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $index => $item)
                                <tr>
                                    <td>{{$index+1}}</td>
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
                                                        <a href="{{ route('itemHistory.show', $item->id) }}" class="btn btn-icon btn-secondary btn-sm" data-bs-toggle="tooltip" title="" data-bs-original-title="Lihat detail riwayat barang">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </td>
                                    <td>{{ $item->itemCategories->name}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
            </div>

        </div>
        <!--end::Row-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->
@endsection

@section('onpage-js')

<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('themes/metronic-demo9/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->

<script>
    function onDelete(id, name) {
        Swal.fire({
            html: 'Are you sure delete <strong>'+name+'</strong> ?',
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Ok, got it!",
            cancelButtonText: 'Nope, cancel it',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then(function (isConfirm) {
           
            // IF User Choose Cancel
            if (!isConfirm.isConfirmed) return;

            document.getElementById('deleteitemCategory'+id).submit();

        });
    }
</script>

@endsection
