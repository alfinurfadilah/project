@extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                @include('layouts.flash-error',[ 'message'=> $error ])
            @endforeach
        @endif
        
        <form action="{{ route('transactionCategory.update') }}" method="POST" id="kt_create_pengeluaran">
            @csrf
            <input type="hidden" name="id" value="{{ $transactionCategory->id }}">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-5">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label required" for="jumlahStock">Nama Kategori Transaksi</label>
                                        <input type="text" class="form-control form-control-solid" name="name" value="{{ old('name', $transactionCategory->name) }}" min="0">
                                        @include('layouts.error', ['name' => 'name'])
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="description">Deskripsi</label>
                                        <textarea name="description" cols="30" rows="10" class="form-control form-control-solid">{{ old('description', $transactionCategory->description) }}</textarea>
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
