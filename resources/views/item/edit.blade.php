@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('item.update', $item->id) }}" method="POST" id="kt_edit_item" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
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
                                    <div class="fv-row mb-10">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="kodeBarang">Kode Barang</label>
                                                <input type="text" class="form-control form-control-solid"
                                                    name="kodeBarang" value="{{ $item->code }}">
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
                                                <input type="text" class="form-control form-control-solid"
                                                    name="namaBarang" value="{{ $item->name }}">
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
                                                <select name="uomId" aria-label="Pilih Satuan" data-control="select2"
                                                    data-placeholder="Pilih Satuan..." data-dropdown-parent="#kt_edit_item"
                                                    class="form-control form-select form-select-solid fw-bolder">
                                                    <option value="">Pilih Satuan...</option>
                                                    @foreach ($uom as $index => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $value->id == $item->uom_id ? 'selected' : '' }}>
                                                            {{ $value->symbol }}</option>
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
                                                <select name="itemCategoryId" aria-label="Pilih Kategori"
                                                    data-control="select2" data-placeholder="Pilih Kategori..."
                                                    data-dropdown-parent="#kt_edit_item"
                                                    class="form-control form-select form-select-solid fw-bolder">
                                                    <option value="">Pilih Kategori...</option>
                                                    @foreach ($itemCategories as $index => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $value->id == $item->item_category_id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
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
                                                <select name="itemTypeId" aria-label="Pilih Jenis Barang"
                                                    data-control="select2" data-placeholder="Pilih Jenis Barang..."
                                                    data-dropdown-parent="#kt_edit_item"
                                                    class="form-control form-select form-select-solid fw-bolder">
                                                    <option value="">Pilih Jenis Barang...</option>
                                                    @foreach ($itemType as $index => $value)
                                                        <option value="{{ $value->id }}"
                                                            {{ $value->id == $item->item_type_id ? 'selected' : '' }}>
                                                            {{ $value->name }}</option>
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
                                                <input name="image" id="image" type="file" class="form-control"
                                                    accept="image/*"
                                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                                <div class="col mb-10-sm-12 mt-5"><img id="output"
                                                        src="{{ asset($item->img_url) }}" class="img-fluid"></div>
                                                @include('layouts.error', ['name' => 'image'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fv-row mb-10">
                                <div class="form-group">
                                    <label class="form-label" for="description">Deskripsi</label>
                                    <textarea name="description" cols="30" rows="10" class="form-control form-control-solid">{{ $item->description }}</textarea>
                                    @include('layouts.error', ['name' => 'description'])
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex d-flex justify-content-end">
                            <a href="{{ route('item.index') }}" type="button" class="btn btn-light me-5">Batal</a>
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
