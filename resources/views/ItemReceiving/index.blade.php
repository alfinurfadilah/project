@extends('layouts.app')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h4>Penerimaan Barang</h4>
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Add customer-->
                    <a href="{{ route('itemReceiving.create') }}" class="btn btn-primary">
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
                        Tambah Penerimaan Barang
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
                </div>
            </div>
            <div class="row g-10">
                <div class="table-responsive">
                    <!--begin::Table-->
                    <table class="table align-middle table-row-bordered fs-6 gy-5 text-start">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="align-middle">No.</th>
                                <th class="align-middle">Nama Penerima</th>
                                <th class="align-middle">Tanggal Diterima</th>
                                <th class="align-middle">Catatan</th>
                                <th class="align-middle">Aksi</th>
                            </tr>
                        </thead>                        
                    </table>
                    <!--end::Table-->
                </div>
            </div>
            <!--end::Row-->
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
