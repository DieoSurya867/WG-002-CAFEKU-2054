@extends('layouts.admin')

@section('title')
    Tambah Data - Menu
@endsection

@section('content')
    <form action="{{ url('admin/menu') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / Menu /</span> Tambah Menu</h4>
            <!-- Form controls -->
            <div class="col-md-6">
                <div class="card mb-4">

                    <h5 class="card-header">Form Tambah Data Menu</h5>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Menu</label>
                            <input type="text"
                                class="form-control @error('namaArtikel') is-invalid
                          @enderror"
                                id="exampleFormControlInput1" name="namaArtikel" value="{{ old('namaArtikel') }}" />
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">File Foto Menu</label>
                            <input class="form-control" type="file" id="formFile" name="foto" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Harga Menu</label>
                            <input type="number"
                                class="form-control @error('harga') is-invalid
                          @enderror"
                                id="exampleFormControlInput1" name="harga" value="{{ old('harga') }}" />
                        </div>
                        <div class="input-group">
                            <span class="input-group-text">Keterangan Menu</span>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" aria-label="With textarea" name="keterangan"
                                value="">{{ old('keterangan') }}
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Pilih Kategori Artikel</label>
                            <select class="form-select @error('kategori_id') is-invalid
                          @enderror"
                                id="exampleFormControlSelect1" aria-label="Default select example" name="kategori_id">
                                <option selected>Pilih Nama Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}" @selected(old('kategori_id') == $item->id)>
                                        {{ $item->namaKategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="mt-3 ms-1 btn btn-sm  btn-outline-primary">Tambah Data</button>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
