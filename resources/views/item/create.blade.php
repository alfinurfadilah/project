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
                                <h3 class="stepper-title">Kelola Harga</h3>
                                <div class="stepper-desc fw-bold">Tentukan detail harga produk anda</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Step 2-->
                        <!--begin::Step 3-->
                        <div class="stepper-item" data-kt-stepper-element="nav">
                            <!--begin::Line-->
                            <div class="stepper-line w-40px"></div>
                            <!--end::Line-->
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">3</span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h3 class="stepper-title">Kelola Stock</h3>
                                <div class="stepper-desc fw-bold">Tentukan stock barang anda</div>
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Step 3-->
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
                                                <label class="form-label required" for="kodeBarang">Kode Barang</label>
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
                                                <label class="form-label required" for="kategoriBarang">Jenis Satuan</label>
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
                                                <label class="form-label required" for="kategoriBarang">Kategori Barang</label>
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
                                                <label class="form-label required" for="jenisBarang">Jenis Barang</label>
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
                                    Kelola Harga
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

                            <div class="row">
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="hargaJual">Harga Modal</label>
                                                <input class="form-control" type="text" name="hargaModal" value="{{ old('hargaModal') }}" data-type="currency" placeholder="Rp 1,000,000.00">
                                                @include('layouts.error', ['name' => 'hargaModal'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="hargaJual">Harga Jual</label>
                                                <input class="form-control" type="text" name="hargaJual" value="{{ old('hargaJual') }}" data-type="currency" placeholder="Rp 1,000,000.00">
                                                @include('layouts.error', ['name' => 'hargaJual'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Input group-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 2-->

                    <!--begin::Step 3-->
                    <div data-kt-stepper-element="content">
                        <!--begin::Wrapper-->
                        <div class="w-100">
                            <!--begin::Heading-->
                            <div class="pb-10 pb-lg-15">
                                <!--begin::Title-->
                                <h2 class="fw-bolder text-dark">
                                    Kelola Stock
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Masukan stok barang yang akan anda simpan"></i>
                                </h2>
                                <!--end::Title-->
                                <!--begin::Notice-->
                                <div class="text-muted fw-bold fs-6">Apabila anda membutuhkan informasi lebih, mohon cek
                                <a href="#" class="link-primary fw-bolder">Pusat Bantuan</a>.</div>
                                <!--end::Notice-->
                            </div>
                            <!--end::Heading-->
                            <!--begin::Input group-->

                            <div class="row">
                                <div class="row mb-10">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input" name="aturStock" type="checkbox" value="" id="flexSwitchAturStock"/>
                                                <label class="form-check-label" for="flexSwitchAturStock">Atur Stock</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="fv-row mb-10" style="display:none;" id="inputJumlahStock">
                                    <div class="col">
                                        <div class="form-group">
                                            <label class="form-label" for="jumlahStock">Stok Saat Ini</label>
                                            <input type="number" class="form-control form-control-solid" name="qty" value="{{ old('qty') }}" min="0">
                                            @include('layouts.error', ['name' => 'qty'])
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Input group-->
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Step 3-->

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
                'kodeBarang': {
                    validators: {
                        notEmpty: {
                            message: 'Kode barang harus di isi'
                        }
                    }
                },
                'namaBarang': {
                    validators: {
                        notEmpty: {
                            message: 'Nama barang harus di isi'
                        }
                    }
                },
                'uomId': {
                    validators: {
                        notEmpty: {
                            message: 'Pilih salah satu satuan barang'
                        }
                    }
                },
                'itemCategoryId': {
                    validators: {
                        notEmpty: {
                            message: 'Pilih salah satu kategori barang'
                        }
                    }
                },
                'itemTypeId': {
                    validators: {
                        notEmpty: {
                            message: 'Pilih salah satu jenis barang'
                        }
                    }
                }
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

    // Validator untuk di step 2
    // validator.push(FormValidation.formValidation(
    //     form,
    //     {
    //         fields: {
    //             'hargaModal': {
    //                 validators: {
    //                     notEmpty: {
    //                         message: 'Harga modal harus di isi'
    //                     }
    //                 }
    //             },
    //             'hargaJual': {
    //                 validators: {
    //                     notEmpty: {
    //                         message: 'Harga jual harus di isi'
    //                     }
    //                 }
    //             }
    //         },

    //         plugins: {
    //             trigger: new FormValidation.plugins.Trigger(),
    //             bootstrap: new FormValidation.plugins.Bootstrap5({
    //                 rowSelector: '.fv-row',
    //                 eleInvalidClass: 'is-invalid',
    //                 eleValidClass: ''
    //             })
    //         }
    //     }
    // ));

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
        if (stepper.getCurrentStepIndex() === 3) {
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
    // handle switch on atur stock section
    $('#flexSwitchAturStock').change(function() {

        if(!this.checked) {
            Swal.fire({
                title: 'Ubah status kelola stok?',
                html: 'Catatan stok akan terhapus setelah ubah status',
                icon: "question",
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: "Ubah",
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: 'btn btn-danger'
                }
            }).then(function (isConfirm) {
            
                // IF User Choose Cancel
                if (!isConfirm.isConfirmed) {
                    $('#flexSwitchAturStock').prop('checked', true);
                    $('#inputJumlahStock').show();
                    return
                };

                $('#inputJumlahStock').hide();

            });
        } else {
            $('#inputJumlahStock').show();
        }
    });
</script>
<!--end::Other form event-->
@endsection