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
                <form action="{{ route('itemCategory.index') }}" method="get">
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
                            placeholder="Cari Jenis Kategori" data-kt-table-filter="searchJenisKategori">
                    </div>
                </form>
                <!--end::Search-->
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Add customer-->
                    <a href="{{ route('itemCategory.create') }}" class="btn btn-primary">Tambah Kategori</a>
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
            <div class="row g-10">

                <div class="card mt-5">
                    <div class="card-body">
                        <!--begin::Table-->
                        <table id="kt_datatable_item_category" class="table align-middle table-row-dashed fs-6 gy-5">
                            <thead>
                                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th class="text-end min-w-70px">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <!--end::Table-->
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

    <script>
        "use strict";

        // Class definition
        var KTDatatablesServerSide = function() {
            // Shared variables
            var table;
            var dt;

            // Private functions
            var initDatatable = function() {
                dt = $("#kt_datatable_item_category").DataTable({
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
                        url: "{{ route('itemCategory.index') }}",
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
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'description',
                            name: 'description'
                        },
                        {
                            data: 'id',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            sClass: "text-center"
                        },
                    ],
                    columnDefs: [{
                        targets: -1,
                        data: null,
                        orderable: false,
                        className: 'text-end',
                        render: function(data, type, full, meta) {
                            var action = `
                                <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click"
                                    data-kt-menu-placement="bottom-end">Actions
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                    <span class="svg-icon svg-icon-5 m-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
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
                                        <a href="{{ route('itemCategory.edit', ':id') }}" class="menu-link px-3">Edit</a>
                                    </div>
                                    <!--end::Menu item-->


                                    <!--begin::Delete button-->
                                    <form action="{{ route('itemCategory.delete', ':id') }}" method="POST"
                                        id="deleteitemCategory` + data + `">
                                        @method('delete')
                                        @csrf
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3">
                                            <a onclick="onDelete(` + full.id + `, '` + full.name + `" class="menu-link px-3">Hapus</a>
                                        </div>
                                        <!--end::Menu item-->
                                    </form>
                                    <!--end::Delete button-->
                                </div>
                                <!--end::Menu-->
                            `;

                            action = action.replaceAll(':id', data);
                            return action.replace(':id', data);
                        },
                    }],
                });

                table = dt.$;

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                dt.on('draw', function() {
                    KTMenu.createInstances();
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = function() {
                const filterSearch = document.querySelector('[data-kt-table-filter="searchJenisKategori"]');
                filterSearch.addEventListener('keyup', function(e) {
                    dt.search(e.target.value).draw();
                });
            }

            // Public methods
            return {
                init: function() {
                    initDatatable();
                    handleSearchDatatable();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesServerSide.init();
        });
    </script>
@endsection
