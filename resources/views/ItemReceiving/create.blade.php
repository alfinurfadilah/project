@extends('layouts.app')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
    <div class="container">

        <!--begin::Post-->
        <div class="row justify-content-center">

            <!--begin::Stepper-->
            <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid"
                id="kt_create_product_stepper">
                <!--begin::Aside-->
                <div
                    class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">
                    <!--begin::Wrapper-->
                    <div class="card-body px-6 px-lg-10 px-xxl-15 py-20">
                        <!--begin::Nav-->
                        <div class="stepper-nav">
                            <!--begin::Step 1-->
                            <div class="stepper-item current" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">1</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Informasi Penerimaan Barang</h3>
                                    <div class="stepper-desc fw-bold">Tentukan informasi penerimaan barang</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 1-->
                            <!--begin::Step 2-->
                            <div class="stepper-item" data-kt-stepper-element="nav">
                                <!--begin::Line-->
                                <div class="stepper-line w-40px"></div>
                                <!--end::Line-->
                                <!--begin::Icon-->
                                <div class="stepper-icon w-40px h-40px">
                                    <i class="stepper-check fas fa-check"></i>
                                    <span class="stepper-number">2</span>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Label-->
                                <div class="stepper-label">
                                    <h3 class="stepper-title">Kelola Barang</h3>
                                    <div class="stepper-desc fw-bold">Tentukan barang yang akan di terima</div>
                                </div>
                                <!--end::Label-->
                            </div>
                            <!--end::Step 2-->
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--begin::Aside-->
                <!--begin::Content-->
                <div class="card d-flex flex-row-fluid flex-center" id="divItem">
                    <!--begin::Form-->
                    <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data"
                        class="card-body py-20 w-100 w-xl-700px px-9" novalidate="novalidate" id="kt_create_product_form">
                        <!--begin::Step 1-->
                        <div class="current" data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder d-flex align-items-center text-dark">Informasi penerimaan barang
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Deskripsikan barang yang akan anda masukan"></i>
                                    </h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-bold fs-6">Apabila anda membutuhkan informasi lebih, mohon cek
                                        <a href="#" class="link-primary fw-bolder">Pusat Bantuan</a>.
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->

                                <!--begin::Input group-->
                                @if (Session::has('error'))
                                    @include('layouts.flash-error', ['message' => Session('error')])
                                @endif

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        @include('layouts.flash-error', ['message' => $error])
                                    @endforeach
                                @endif

                                @csrf

                                <div class="row">
                                    <div class="col">
                                            <div class="form-group">
                                                <label class="required fw-bold fs-6 mb-2" class="form-label" for="date">Tanggal Penerimaan</label>
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="21" viewBox="0 0 20 21" fill="none">
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
                                                    <input class="form-control" name="flatpickr_input" placeholder="Pick a date" id="kt_datepicker_1"/>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col">
                                        <div class="fv-row mb-10">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="required fw-bold fs-6 mb-2" class="form-label" for="noPenerimaanBarang">No. Penerimaan Barang</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="noPenerimaanBarang" value="{{ old('noPenerimaanBarang') }}" placeholder="Nomor Penerimaan Barang">
                                                    @include('layouts.error', ['name' => 'noPenerimaanBarang'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-10">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label" for="supplier">Supplier</label>
                                                    <select name="supplierId" aria-label="Pilih Supplier" data-control="select2"
                                                        data-placeholder="Pilih Supplier"
                                                        data-dropdown-parent="#kt_create_product_form"
                                                        class="form-control form-select form-select-solid fw-bolder">
                                                        <option value="">Pilih Supplier...</option>
                                                        @foreach ($supplier as $index => $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @include('layouts.error', ['name' => 'supplierId'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="note">Catatan</label>
                                            <textarea name="note" cols="30" rows="10" placeholder="Catatan" class="form-control form-control-solid">{{ old('description') }}</textarea>
                                            @include('layouts.error', ['name' => 'note'])
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Step 1-->

                        <!--begin::Step 2-->
                        <div data-kt-stepper-element="content">
                            <!--begin::Wrapper-->
                            <div class="w-100">
                                <!--begin::Heading-->
                                <div class="pb-10 pb-lg-15">
                                    <!--begin::Title-->
                                    <h2 class="fw-bolder text-dark">
                                        Kelola Barang
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Masukan nilai harga barang yang akan anda simpan"></i>
                                    </h2>
                                    <!--end::Title-->
                                    <!--begin::Notice-->
                                    <div class="text-muted fw-bold fs-6">Apabila anda membutuhkan informasi lebih, mohon
                                        cek
                                        <a href="#" class="link-primary fw-bolder">Pusat Bantuan</a>.
                                    </div>
                                    <!--end::Notice-->
                                </div>
                                <!--end::Heading-->

                                <!--begin::Input group-->
                                <div id="batchFormInput"></div>

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-10">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label id="listBarang" class="form-label" for="namaBarang">Barang</label>
                                                    <select name="uomId" aria-label="Pilih Satuan" data-control="select2"
                                                        data-placeholder="Pilih Barang..."
                                                        data-dropdown-parent="#kt_create_product_form"
                                                        class="form-control form-select form-select-solid fw-bolder">
                                                        <option value="">Pilih Barang...</option>
                                                        @foreach ($barang as $index => $value)
                                                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @include('layouts.error', ['name' => 'uomId'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="fv-row mb-10">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="required fw-bold fs-6 mb-2" class="form-label" for="qty">Qty</label>
                                                    <input type="text" class="form-control form-control-solid"
                                                        name="qty" value="{{ old('qty') }}" placeholder="Jumlah Barang Yang Masuk">
                                                    @include('layouts.error', ['name' => 'qty'])
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-10">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Catatan</label>
                                            <textarea name="description" cols="30" rows="5" placeholder="Catatan" class="form-control form-control-solid">{{ old('description') }}</textarea>
                                            @include('layouts.error', ['name' => 'description'])
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row"> 
                                    <div class="col"> 
                                        <a href="#" style="float: right;" class="btn btn-success" data-kt-stepper-action="tambah" onclick="tambahonClick()">Tambah ke list</a> 
                                    </div> 
                                </div>

                                <!--end::Input group-->

                                <div class="row">
                                <div class="row g-10">
                                        <div class="table-responsive">
                                        <label class="form-label" for="listBarang">List barang diterima</label>
                                            <table class="table align-middle table-row-bordered fs-6 gy-5 text-start">
                                                <thead>
                                                    <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                                        <th class="align-middle">No</th>
                                                        <th class="align-middle">Nama Barang</th>
                                                        <th class="align-middle">Qty</th>
                                                        <th class="align-middle">Satuan</th>
                                                        <th class="align-middle">Catatan</th>
                                                        <th class="align-middle">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="listBarangTableBody">
                                                    <!-- Tabel barang yang sudah ditambahkan akan ditampilkan di sini -->
                                                </tbody>
                                            </table>
                                            <p id="listBarangErrorMessage" style="color: red; display: none;">List barang harus diisi.</p>
                                        </div>
                                    </div>

                                <!--end::Row-->

                            </div>
                            <!--end::Wrapper-->
                        </div>
                     </div>
                        <!--end::Step 2-->

                        <!--begin::Actions-->
                        <div class="d-flex flex-stack pt-10">
                            <!--begin::Wrapper-->
                            <div class="mr-2">
                                <button type="button" class="btn btn-lg btn-light-primary me-3"
                                    data-kt-stepper-action="previous">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                                    <span class="svg-icon svg-icon-4 me-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="6" y="11" width="13"
                                                height="2" rx="1" fill="black" />
                                            <path
                                                d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->Back
                                </button>
                            </div>
                            <!--end::Wrapper-->
                            <!--begin::Wrapper-->
                            <div>
                                <button type="button" class="btn btn-lg btn-primary me-3"
                                    data-kt-stepper-action="submit">
                                    <span class="indicator-label">Submit
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                        <span class="svg-icon svg-icon-3 ms-2 me-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="18" y="13" width="13"
                                                    height="2" rx="1" transform="rotate(-180 18 13)"
                                                    fill="black" />
                                                <path
                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <button type="button" class="btn btn-lg btn-primary"
                                    data-kt-stepper-action="next">Continue
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                    <span class="svg-icon svg-icon-4 ms-1 me-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="18" y="13" width="13"
                                                height="2" rx="1" transform="rotate(-180 18 13)"
                                                fill="black" />
                                            <path
                                                d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </button>
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->

                    <div class="overlay-layer card-rounded bg-dark bg-opacity-5" style="display: none;"
                        id="overlayDivItem">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>

                </div>
                <!--end::Content-->
            </div>
            <!--end::Stepper-->
        </div>
        <!--end::Post-->
    </div>
@endsection

@section('onpage-js')

    <!-- datetime tanggal produksi -->
    <script>
        $("#kt_datepicker_1").flatpickr();
    </script>
    <!-- end datetime tanggal produksi -->

    <!--begin::Stepper form handle script-->
    <script>
        // Form Validator
        // Define form element
        const form = document.getElementById('kt_create_product_form');
        var validator = [];

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        // Validator untuk di step 1
        validator.push(FormValidation.formValidation(
            form, {
                fields: {
                    'noPenerimaanBarang': {
                        validators: {
                            notEmpty: {
                                message: 'Nomor penerimaan barang harus di isi'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: 'is-invalid',
                        eleValidClass: ''
                    })
                }
            }
        ));

        // Stepper lement
        var element = document.querySelector("#kt_create_product_stepper");

        // Initialize Stepper
        var stepper = new KTStepper(element);

        // Handle next step
        stepper.on("kt.stepper.next", function(stepper) {
            var validate = validator[stepper.getCurrentStepIndex() - 1];

            // Validate form before submit
            if (validate) {
                validate.validate().then(function(status) {
                    if (status == 'Valid') {
                        stepper.goNext(); // go next step
                    }
                });
            } else {
                stepper.goNext(); // go next step
            }
        });

        // Handle previous step
        stepper.on("kt.stepper.previous", function(stepper) {
            stepper.goPrevious(); // go previous step
        });

        // begin::Stepper change event
        submitButton = element.querySelector('[data-kt-stepper-action="submit"]');
        tambahButton = element.querySelector('[data-kt-stepper-action="tambah"]');

        var formSubmitButton = submitButton;
        var formTambahButton = tambahButton;

        stepper.on('kt.stepper.changed', function(stepper) {
            if (stepper.getCurrentStepIndex() === 2) {
                formSubmitButton.classList.remove('d-none');
                formSubmitButton.classList.add('d-inline-block');
            } else {
                formSubmitButton.classList.remove('d-inline-block');
                formSubmitButton.classList.remove('d-none');
            }
        });
        // end::Stepper change event

        // begin::Handle tambah event
        tambahButton.addEventListener("click", (function(e) {
            e.preventDefault()
        }));
        // end::Handle tambah event

        // begin::Handle submit event
        submitButton.addEventListener("click", function(e) {
        e.preventDefault();

        var validate = validator[stepper.getCurrentStepIndex() == 1];
        var listBarang = document.getElementById("listBarangTableBody").children;
        var errorMessage = document.getElementById("listBarangErrorMessage");

        // Validasi hanya pada tombol submit
        if (listBarang.length > 0) {
            // Jika list barang lebih dari 1, langsung submit
            errorMessage.style.display = "none"; // Sembunyikan pesan error jika ada
            $('form#kt_create_product_form').submit();
        } else {
            // Jika tidak ada barang, maka tampilkan pesan error
            errorMessage.style.display = "block"; // Tampilkan pesan error
            if (validate) {
                // Lakukan validasi jika ada validator yang diberikan
                validate.validate().then(function(status) {
                    if (status == 'Valid') {
                        $('form#kt_create_product_form').submit();
                    }
                });
            }
        }
    });
        // end::Handle submit event
    </script>
    <!--end::Stepper form handle script-->

    <!--begin::Other form event-->
    <script>
        validator.push(FormValidation.formValidation(
            form, {
                fields: {
                    'qty': {
                        validators: {
                            notEmpty: {
                                message: 'Qty barang harus di isi'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: 'is-invalid',
                        eleValidClass: ''
                    })
                }
            }
        ));
        
        document.addEventListener('DOMContentLoaded', function(e) {
            const batchIdValidators = {
                validators: {
                    notEmpty: {
                        message: 'Batch ID tidak boleh kosong',
                    },
                },
            };
            const jumlahStockValidators = {
                validators: {
                    notEmpty: {
                        message: 'Jumlah Stok tidak boleh kosong',
                    },
                    numeric: {
                        message: 'Jumlah stok harus berupa angka',
                    },
                },
            };
            const hargaModalValidators = {
                validators: {
                    // notEmpty: {
                    //     message: 'Harga modal tidak boleh kosong',
                    // }, 
                    numeric: {
                        message: 'Harga modal harus berupa angka',
                    },
                },
            };
            const hargaJualValidators = {
                validators: {
                    // notEmpty: {
                    //     message: 'Harga jual tidak boleh kosong',
                    // },
                    numeric: {
                        message: 'Harga jual harus berupa angka',
                    },
                },
            };

            const demoForm = form;
            validator.push(FormValidation.formValidation(demoForm, {
                fields: {
                    'batchId[0]': batchIdValidators,
                    'qtyStock[0]': jumlahStockValidators,
                    'hargaModal[0]': hargaModalValidators,
                    'hargaJual[0]': hargaJualValidators,
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: 'is-invalid',
                        eleValidClass: ''
                    })
                },
            }));

            const removeRow = function(rowIndex) {
                const row = demoForm.querySelector('[data-row-index="' + rowIndex + '"]');

                // Remove field
                validator[1].removeField('batchId[' + rowIndex + ']')
                    .removeField('qtyStock[' + rowIndex + ']')
                    .removeField('hargaModal[' + rowIndex + ']')
                    .removeField('hargaJual[' + rowIndex + ']');

                // Remove row
                row.parentNode.removeChild(row);
            };

            const template = document.getElementById('templateBatchFormInput');
            let rowIndex = 0;

            document.getElementById('btnAddBatch').addEventListener('click', function() {

                const clone = template.cloneNode(true);
                clone.removeAttribute('id');

                // Show the row
                clone.style.display = 'block';

                clone.setAttribute('data-row-index', rowIndex);

                // Insert before the template
                template.before(clone);

                clone.querySelector('[data-name="stock.batchId"]').setAttribute('name', 'batchId[' +
                    rowIndex + ']');
                clone.querySelector('[data-name="stock.qtyStock"]').setAttribute('name', 'qtyStock[' +
                    rowIndex + ']');
                clone.querySelector('[data-name="stock.hargaModal"]').setAttribute('name', 'hargaModal[' +
                    rowIndex + ']');
                clone.querySelector('[data-name="stock.hargaJual"]').setAttribute('name', 'hargaJual[' +
                    rowIndex + ']');
                clone.querySelector('[data-name="stock.tglProduksi"]').setAttribute('name', 'tglProduksi[' +
                    rowIndex + ']');
                clone.querySelector('[data-name="stock.tglKadaluarsa"]').setAttribute('name',
                    'tglKadaluarsa[' + rowIndex + ']');

                clone.querySelector('[data-name="stock.tglProduksi"]').setAttribute('id',
                    'datepicker_tgl_produksi_' + rowIndex);
                clone.querySelector('[data-name="stock.tglKadaluarsa"]').setAttribute('id',
                    'datepicker_tgl_kadaluarsa_' + rowIndex);

                // init datepicker
                $('#datepicker_tgl_produksi_' + rowIndex).flatpickr({
                    dateFormat: "d F Y",
                });
                $('#datepicker_tgl_kadaluarsa_' + rowIndex).flatpickr({
                    dateFormat: "d F Y",
                });

                // Add new fields
                // Note that we also pass the validator rules for new field as the third parameter
                validator[1].addField('batchId[' + rowIndex + ']', batchIdValidators)
                    .addField('qtyStock[' + rowIndex + ']', jumlahStockValidators)
                    .addField('hargaModal[' + rowIndex + ']', hargaModalValidators)
                    .addField('hargaJual[' + rowIndex + ']', hargaJualValidators);

                // Handle the click event of removeButton
                const removeBtn = clone.querySelector('.btnRemove');
                removeBtn.setAttribute('data-row-index', rowIndex);
                removeBtn.addEventListener('click', function(e) {
                    // Get the row index
                    const index = $(this).data("row-index");
                    removeRow(index);
                });

                rowIndex++;
            });
        });
    </script>
    
<script>
    //Fungsi untuk menyembunyikan pesan error ketika ada data yang ditambahkan ke dalam list barang
    function hideErrorMessage() {
        var errorMessage = document.getElementById("listBarangErrorMessage");
        errorMessage.style.display = "none"; // Sembunyikan pesan error
    }

    // Fungsi untuk menampilkan pesan error ketika tidak ada barang dalam list barang
    function showErrorMessage() {
        var errorMessage = document.getElementById("listBarangErrorMessage");
        errorMessage.style.display = "block"; // Tampilkan pesan error
    }

    function tambahonClick() {
        var namaBarang = document.querySelector('[name="uomId"] option:checked').text;
        var qty = document.querySelector('[name="qty"]').value;
        var satuan = document.querySelector('[name="uomId"] option:checked').text;
        var catatan = document.querySelector('[name="description"]').value;

        var item = {
            namaBarang: namaBarang,
            qty: qty,
            satuan: satuan,
            catatan: catatan,
        };

        console.log(item);
        
        // Panggil fungsi hideErrorMessage() untuk menyembunyikan pesan error
        hideErrorMessage();

        var validate = validator[1];

        // Validate form before submit
        if (validate) {
            validate.validate().then(function(status) {
                if (status == 'Valid') {
                    // simpan data ke dalam array
                    tambahBarang(item);
                    // clear form
                    document.contact-form.reset();

                    $('select').select2({ 
                    });

                    $( "#tambah" ).click(function() {    
                    $("select").val('').change();
                });

                // Panggil fungsi hideErrorMessage() kembali setelah data ditambahkan ke dalam list barang
                hideErrorMessage();
                
                }
            });
        } else {
            //tidak lolos validasi
        }
        };
    

    var listBarang = [];

    function tambahBarang(item) {
        listBarang.push(item);
        updateTable();
    }

    function hapusBarang(index) {
        listBarang.splice(index, 1);
        updateTable();
    }

    function updateTable() {
        var tableBody = document.getElementById("listBarangTableBody");
        tableBody.innerHTML = "";

        for (var i = 0; i < listBarang.length; i++) {
            var row = document.createElement("tr");
            var numCell = document.createElement("td");
            var namaBarangCell = document.createElement("td");
            var qtyCell = document.createElement("td");
            var satuanCell = document.createElement("td");
            var catatanCell = document.createElement("td");
            var deleteCell = document.createElement("td");

            numCell.textContent = i + 1;
            namaBarangCell.textContent = listBarang[i].namaBarang;
            qtyCell.textContent = listBarang[i].qty;
            satuanCell.textContent = listBarang[i].satuan;
            catatanCell.textContent = listBarang[i].catatan;

            var deleteButton = document.createElement("button");
            deleteButton.textContent = "Hapus";
            deleteButton.setAttribute("class", "btn btn-danger btn-sm");
            deleteButton.setAttribute("onclick", "hapusBarang(" + i + ")");

            deleteCell.appendChild(deleteButton);

            row.appendChild(numCell);
            row.appendChild(namaBarangCell);
            row.appendChild(qtyCell);
            row.appendChild(satuanCell);
            row.appendChild(catatanCell);
            row.appendChild(deleteCell);

            tableBody.appendChild(row);
        }
    }
</script>
    
<script>
    function submit() {
        // Gather data from the form
        var uomId = $("select[name='uomId']").val();
        var qty = $("input[name='qty']").val();
        var description = $("textarea[name='description']").val();

        // Validate data
        if (uomId === "" || qty === "") {
            $("#listBarangErrorMessage").text("Please fill in all required fields.");
            $("#listBarangErrorMessage").show();
            return;
        } else {
            $("#listBarangErrorMessage").hide();
        }

        // Validate data further if needed
        // For example, check if qty is a valid number, etc.

        // Prepare the data to be sent
        var data = {
            uomId: uomId,
            qty: qty,
            description: description
        };

        // Send the AJAX request
        $.ajax({
            url: "{{ route('itemReceiving.store') }}", // Replace with your actual route
            type: "POST",
            data: data,
            success: function(response) {
                // Handle success
                // You can update the list of added items here if needed
                // For example, you can append a new row to the table
                var newRow = "<tr><td>New Data</td><td>" + uomId + "</td><td>" + qty + "</td><td>" + description + "</td><td><button>Delete</button></td></tr>";
                $("#listBarangTableBody").append(newRow);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    }
</script>
<!--end::Other form event-->
@endsection