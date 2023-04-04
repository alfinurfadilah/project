@extends('layouts.app')
<!-- © 2020 Copyright: Tahu Coding -->
@section('content')
<div class="container">

    <!--begin::Post-->
    <div class="row justify-content-center">

        <!--begin::Stepper-->
        <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_create_product_stepper">
            <!--begin::Aside-->
            <div class="card d-flex justify-content-center justify-content-xl-start flex-row-auto w-100 w-xl-300px w-xxl-400px me-9">
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
                                <h3 class="stepper-title">Informasi Produk</h3>
                                <div class="stepper-desc fw-bold">Tentukan informasi produk anda</div>
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
                                <h3 class="stepper-title">Kelola Stock & Harga (Opsional)</h3>
                                <div class="stepper-desc fw-bold">Tentukan detail harga produk anda</div>
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
            <div class="card d-flex flex-row-fluid flex-center">
                <!--begin::Form-->
                <form action="{{route('item.store')}}" method="POST" enctype="multipart/form-data" class="card-body py-20 w-100 w-xl-700px px-9" novalidate="novalidate" id="kt_create_product_form">
                    <!--begin::Step 1-->
                    <div class="current" data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <!--begin::Heading-->
                            <div class="pb-10 pb-lg-15">
                                <!--begin::Title-->
                                <h2 class="fw-bolder d-flex align-items-center text-dark">Informasi produk
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Deskripsikan barang yang akan anda masukan"></i></h2>
                                <!--end::Title-->
                                <!--begin::Notice-->
                                <div class="text-muted fw-bold fs-6">Apabila anda membutuhkan informasi lebih, mohon cek
                                <a href="#" class="link-primary fw-bolder">Pusat Bantuan</a>.</div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            @if(Session::has('error'))
                                @include('layouts.flash-error',[ 'message'=> Session('error') ])
                            @endif

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    @include('layouts.flash-error',[ 'message'=> $error ])
                                @endforeach
                            @endif
                            
                            @csrf
                            
                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="kodeBarang">Kode Barang</label>
                                                <input type="text" class="form-control form-control-solid" name="kodeBarang" value="{{ old('kodeBarang') }}">
                                                @include('layouts.error', ['name' => 'kodeBarang'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label required" for="namaBarang">Nama Barang</label>
                                                <input type="text" class="form-control form-control-solid" name="namaBarang" value="{{ old('namaBarang') }}">
                                                @include('layouts.error', ['name' => 'namaBarang'])
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
                                                <label class="form-label" for="kategoriBarang">Jenis Satuan</label>
                                                <select name="uomId" aria-label="Pilih Satuan" data-control="select2" data-placeholder="Pilih Satuan..." data-dropdown-parent="#kt_create_product_form" class="form-control form-select form-select-solid fw-bolder">
                                                    <option value="">Pilih Satuan...</option>
                                                    @foreach ($uom as $index=>$value)
                                                        <option value="{{ $value->id }}">{{ $value->symbol}}</option>
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
                                                <label class="form-label" for="kategoriBarang">Kategori Barang</label>
                                                <select name="itemCategoryId" aria-label="Pilih Kategori" data-control="select2" data-placeholder="Pilih Kategori..." data-dropdown-parent="#kt_create_product_form" class="form-control form-select form-select-solid fw-bolder">
                                                    <option value="">Pilih Kategori...</option>
                                                    @foreach ($itemCategories as $index=>$value)
                                                        <option value="{{ $value->id }}">{{ $value->name}}</option>
                                                    @endforeach
                                                </select>
                                                @include('layouts.error', ['name' => 'itemCategoryId'])
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
                                                <label class="form-label" for="jenisBarang">Jenis Barang</label>
                                                <select name="itemTypeId" aria-label="Pilih Jenis Barang" data-control="select2" data-placeholder="Pilih Jenis Barang..." data-dropdown-parent="#kt_create_product_form" class="form-control form-select form-select-solid fw-bolder">
                                                    <option value="">Pilih Jenis Barang...</option>
                                                    @foreach ($itemType as $index=>$value)
                                                        <option value="{{ $value->id }}">{{ $value->name}}</option>
                                                    @endforeach
                                                </select>
                                                @include('layouts.error', ['name' => 'itemTypeId'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-5">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="gambarBarang">Gambar Barang</label>
                                                <input name="image" id="image" type="file" class="form-control" accept="image/*" onchange ="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                                <div class="col mb-10-sm-12 mt-5"><img id="output" src="" class="img-fluid"></div>
                                                @include('layouts.error', ['name' => 'image'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="fv-row mb-10">
                                <div class="form-group">
                                    <label class="form-label" for="description">Deskripsi</label>
                                    <textarea name="description" cols="30" rows="10" class="form-control form-control-solid">{{ old('description') }}</textarea>
                                    @include('layouts.error', ['name' => 'description'])
                                </div>
                            </div>
                            <!--end::Input group-->
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
                                    Kelola Stock & Harga (Opsional)
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukan nilai harga barang yang akan anda simpan"></i>
                                </h2>
                                <!--end::Title-->
                                <!--begin::Notice-->
                                <div class="text-muted fw-bold fs-6">Apabila anda membutuhkan informasi lebih, mohon cek
                                <a href="#" class="link-primary fw-bolder">Pusat Bantuan</a>.</div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Heading-->

                            <!--begin::Input group-->
                            <div id="batchFormInput"></div>

                            <div class="row" id="templateBatchFormInput" style="display:none">
                                <div class="row">
                                    <div class="col">
                                        <div class="fv-row mb-10">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label required" for="hargaJual">Batch ID</label>
                                                    <input class="form-control" type="text" data-name="stock.batchId">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label required" for="hargaJual">Jumlah Stok</label>
                                                    <input class="form-control" type="text" data-name="stock.qtyStock">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-10">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hargaJual">Tanggal Produksi</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">
                                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                                                    <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                            <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black"/>
                                                            <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black"/>
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <input class="form-control flatpickr-input active fw-200" placeholder="Pick date" type="text" readonly="readonly" data-name="stock.tglProduksi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="hargaJual">Tanggal Kadaluarsa</label>
                                            <div class="col d-flex align-items-center">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">
                                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/files/fil002.svg-->
                                                        <span class="svg-icon svg-icon-1 svg-icon-primary">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                                                <path opacity="0.3" d="M19 3.40002C18.4 3.40002 18 3.80002 18 4.40002V8.40002H14V4.40002C14 3.80002 13.6 3.40002 13 3.40002C12.4 3.40002 12 3.80002 12 4.40002V8.40002H8V4.40002C8 3.80002 7.6 3.40002 7 3.40002C6.4 3.40002 6 3.80002 6 4.40002V8.40002H2V4.40002C2 3.80002 1.6 3.40002 1 3.40002C0.4 3.40002 0 3.80002 0 4.40002V19.4C0 20 0.4 20.4 1 20.4H19C19.6 20.4 20 20 20 19.4V4.40002C20 3.80002 19.6 3.40002 19 3.40002ZM18 10.4V13.4H14V10.4H18ZM12 10.4V13.4H8V10.4H12ZM12 15.4V18.4H8V15.4H12ZM6 10.4V13.4H2V10.4H6ZM2 15.4H6V18.4H2V15.4ZM14 18.4V15.4H18V18.4H14Z" fill="black"/>
                                                                <path d="M19 0.400024H1C0.4 0.400024 0 0.800024 0 1.40002V4.40002C0 5.00002 0.4 5.40002 1 5.40002H19C19.6 5.40002 20 5.00002 20 4.40002V1.40002C20 0.800024 19.6 0.400024 19 0.400024Z" fill="black"/>
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </span>
                                                    <input class="form-control flatpickr-input active fw-200" placeholder="Pick date" type="text" readonly="readonly" data-name="stock.tglKadaluarsa">
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
                                                    <label class="form-label" for="hargaJual">Harga Modal</label>
                                                    <input class="form-control" type="text" data-name="stock.hargaModal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="fv-row mb-10">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-label" for="hargaJual">Harga Jual</label>
                                                    <input class="form-control" type="text" data-name="stock.hargaJual">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-10">
                                    <div class="col">
                                        <div class="form-group">
                                            <button type="button" class="form-control btn btn-sm btn-danger me-3 btnRemove">
                                                <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr015.svg-->
                                                <span class="svg-icon svg-icon-muted svg-icon-2x">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM18 12C18 11.4 17.6 11 17 11H7C6.4 11 6 11.4 6 12C6 12.6 6.4 13 7 13H17C17.6 13 18 12.6 18 12Z" fill="black"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-10"></div>
                            </div>
                            
                            <div class="row">
                                <button type="button" class="btn btn-lg btn-success me-3" id="btnAddBatch">
                                    <span class="indicator-label">
                                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr087.svg-->
                                        <span class="svg-icon svg-icon-muted svg-icon-2x">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="black"/>
                                                <rect x="6" y="11" width="12" height="2" rx="1" fill="black"/>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        Add Batch
                                    </span>
                                </button>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 2-->

                    <!--begin::Actions-->
                    <div class="d-flex flex-stack pt-10">
                        <!--begin::Wrapper-->
                        <div class="mr-2">
                            <button type="button" class="btn btn-lg btn-light-primary me-3" data-kt-stepper-action="previous">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                            <span class="svg-icon svg-icon-4 me-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="11" width="13" height="2" rx="1" fill="black" />
                                    <path d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Back</button>
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Wrapper-->
                        <div>
                            <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
                                <span class="indicator-label">Submit
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                <span class="svg-icon svg-icon-3 ms-2 me-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon--></span>
                                <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                                <span class="svg-icon svg-icon-4 ms-1 me-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="18" y="13" width="13" height="2" rx="1" transform="rotate(-180 18 13)" fill="black" />
                                        <path d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z" fill="black" />
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
            </div>
            <!--end::Content-->
        </div>
        <!--end::Stepper-->
    </div>
    <!--end::Post-->

</div>
@endsection

@section('onpage-js')

<!--begin::Stepper form handle script-->
<script>
    // Form Validator
    // Define form element
    const form = document.getElementById('kt_create_product_form');
    var validator = [];

    // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
    // Validator untuk di step 1
    validator.push(FormValidation.formValidation(
        form,
        {
            fields: {
                'namaBarang': {
                    validators: {
                        notEmpty: {
                            message: 'Nama barang harus di isi'
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
    stepper.on("kt.stepper.next", function (stepper) {
        var validate = validator[stepper.getCurrentStepIndex() - 1];

        // Validate form before submit
        if (validate) {
            validate.validate().then(function (status) {
                if (status == 'Valid') {
                    stepper.goNext(); // go next step
                }
            });
        } else {
            stepper.goNext(); // go next step
        }
    });

    // Handle previous step
    stepper.on("kt.stepper.previous", function (stepper) {
        stepper.goPrevious(); // go previous step
    });

    // begin::Stepper change event
    submitButton = element.querySelector('[data-kt-stepper-action="submit"]');

    var formSubmitButton = submitButton;

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
    
    // begin::Handle submit event
    submitButton.addEventListener("click", (function (e) {
        e.preventDefault()

        var validate = validator[stepper.getCurrentStepIndex() - 1];

        // Validate form before submit
        if (validate) {
            validate.validate().then(function (status) {
                if (status == 'Valid') {
                    $('form#kt_create_product_form').submit();
                }
            });
        } else {
            $('form#kt_create_product_form').submit();
        }
    }));
    // end::Handle submit event

</script>
<!--end::Stepper form handle script-->

<!--begin::Other form event-->
<script>
    document.addEventListener('DOMContentLoaded', function (e) {
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

        const removeRow = function (rowIndex) {
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

        document.getElementById('btnAddBatch').addEventListener('click', function () {

            const clone = template.cloneNode(true);
            clone.removeAttribute('id');

            // Show the row
            clone.style.display = 'block';

            clone.setAttribute('data-row-index', rowIndex);

            // Insert before the template
            template.before(clone);

            clone.querySelector('[data-name="stock.batchId"]').setAttribute('name', 'batchId[' + rowIndex + ']');
            clone.querySelector('[data-name="stock.qtyStock"]').setAttribute('name', 'qtyStock[' + rowIndex + ']');
            clone.querySelector('[data-name="stock.hargaModal"]').setAttribute('name', 'hargaModal[' + rowIndex + ']');
            clone.querySelector('[data-name="stock.hargaJual"]').setAttribute('name', 'hargaJual[' + rowIndex + ']');
            clone.querySelector('[data-name="stock.tglProduksi"]').setAttribute('name', 'tglProduksi[' + rowIndex + ']');
            clone.querySelector('[data-name="stock.tglKadaluarsa"]').setAttribute('name', 'tglKadaluarsa[' + rowIndex + ']');

            clone.querySelector('[data-name="stock.tglProduksi"]').setAttribute('id', 'datepicker_tgl_produksi_' + rowIndex);
            clone.querySelector('[data-name="stock.tglKadaluarsa"]').setAttribute('id', 'datepicker_tgl_kadaluarsa_' + rowIndex);

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
            removeBtn.addEventListener('click', function (e) {
                // Get the row index
                const index = $(this).data("row-index");
                removeRow(index);
            });

            rowIndex++;
        });
    });
</script>

<!--end::Other form event-->
@endsection