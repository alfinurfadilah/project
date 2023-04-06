@extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @include('layouts.flash-error',[ 'message'=> $error ])
            @endforeach
        @endif
        
        <form action="{{ route('supplier.update') }}" method="POST" id="kt_create_pengeluaran">
            @csrf
            <input type="hidden" name="id" value="{{ $supplier->id }}">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label required" for="jumlahStock">Nama Supplier</label>
                                        <input type="text" class="form-control form-control-solid" name="name" value="{{ old('name', $supplier->name) }}" min="0">
                                        @include('layouts.error', ['name' => 'name'])
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label required" for="jumlahStock">No Telpon</label>
                                        <input type="number" class="form-control form-control-solid" name="phone" value="{{ old('phone', $supplier->phone) }}" min="0">
                                        @include('layouts.error', ['name' => 'phone'])
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label required" for="jumlahStock">No Handphone</label>
                                        <input type="number" class="form-control form-control-solid" name="mobilephone" value="{{ old('phone', $supplier->mobile_phone) }}" min="0">
                                        @include('layouts.error', ['name' => 'phone'])
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label required" for="jumlahStock">Email</label>
                                        <input type="email" class="form-control form-control-solid" name="email" value="{{ old('name', $supplier->email) }}" min="0">
                                        @include('layouts.error', ['name' => 'name'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Alamat</label>
                                        <textarea name="address" cols="30" rows="10" class="form-control form-control-solid">{{ old('address', $supplier->address) }}</textarea>
                                        @include('layouts.error', ['name' => 'address'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Deskripsi</label>
                                        <textarea name="description" cols="30" rows="10" class="form-control form-control-solid">{{ old('address', $supplier->description) }}</textarea>
                                        @include('layouts.error', ['name' => 'address'])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex d-flex justify-content-end">
                            <button type="button" class="btn btn-light me-5" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    @endsection
    
    @section('onpage-js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    @if(Session::has('errorTransaksi'))
    <script>
        toastr.error(
            'Data tidak valid'
        )

    </script>
    @endif

    @if(Session::has('success'))
    <script>
        toastr.success(
            'Data berhasil di perbaharui'
        )

    </script>
    @endif
    @endsection
