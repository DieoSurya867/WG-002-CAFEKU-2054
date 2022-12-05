@extends('layouts.admin')

@section('title')
    Edit Data - Menu
@endsection

@section('content')
    <form action="{{ route('menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / Menu /</span> Edit Menu</h4>
            <!-- Form controls -->
            <div class="col-md-6">
                <div class="card mb-4">

                    <h5 class="card-header">Form Edit Data Menu</h5>
                    <div class="card-body">

                        <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Nama Menu</label>
                            <input class="form-control @error('namaArtikel') is-invalid
                          @enderror"
                                type="text" id="exampleFormControlReadOnlyInput1" name="namaArtikel"
                                value="{{ $menu->namaArtikel }}" />
                        </div>
                        <div class="mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <img class="img-fluid d-flex mx-auto my-4" src="{{ asset('storage/' . $menu->foto) }}"
                                        alt="Card image cap" />
                                </div>
                            </div>
                            <label for="formFile" class="form-label">Ganti Foto Menu</label>
                            <input class="form-control" type="file" id="formFile" name="foto" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlReadOnlyInput1" class="form-label">Harga Menu</label>
                            <input class="form-control @error('harga') is-invalid
                          @enderror"
                                type="text" id="exampleFormControlReadOnlyInput1" name="harga"
                                value="{{ $menu->harga }}" />
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">Keterangan Menu</span>
                            <textarea class="form-control" aria-label="With textarea" name="keterangan">{{ $menu->keterangan }}
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Pilih Kategori Menu</label>
                            <select class="form-select @error('kategori_id') is-invalid
                          @enderror"
                                id="exampleFormControlSelect1" aria-label="Default select example" name="kategori_id">
                                <option selected>Pilih Nama Kategori</option>
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $menu->kategori_id ? 'selected' : '' }}>{{ $item->namaKategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <button type="submit" class="mt-1 ms-1 btn btn-sm  btn-outline-primary">Edit produk</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
