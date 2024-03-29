@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('customer.store') }}" method="POST" id="kt_create_pengeluaran">
        @csrf
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="jumlahStock">Nama Customer</label>
                                    <input type="text" class="form-control form-control-solid" name="namaUom" value="{{ old('namaUom') }}">
                                    @include('layouts.error', ['name' => 'namaUom'])
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label required" for="jumlahStock">Simbol</label>
                                    <input type="text" class="form-control form-control-solid" name="simbol" value="{{ old('simbol') }}">
                                    @include('layouts.error', ['name' => 'simbol'])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label class="form-label" for="description">Deskripsi Satuan</label>
                                    <textarea name="description" cols="30" rows="10" class="form-control form-control-solid">{{ old('description') }}</textarea>
                                    @include('layouts.error', ['name' => 'description'])
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
@endsection
