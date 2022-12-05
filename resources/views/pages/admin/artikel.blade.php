@extends('layouts.admin')


@section('title')
    Dashboard - Menu
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Menu</h4>

            <!-- Basic Bootstrap Table -->
            <div class="card">
                <h5 class="card-header">Table Admin Menu</h5>
                <div class="table-responsive text-nowrap">
                    <a href="{{ route('menu.create') }}" class="ms-4 mb-4 btn btn-sm  btn-outline-primary">Tambah
                        Menu Baru</a>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            {{-- untuk memunculkan data sesuai banyak data table menus --}}
                            @foreach ($menu as $item)
                                <tr>
                                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                        {{-- untuk menghitung nomer data --}}
                                        <strong>{{ $loop->iteration }}</strong>
                                    </td>
                                    {{-- untuk memunculkan data array nama menu --}}
                                    <td>{{ $item['namaArtikel'] }}</td>
                                    {{-- untuk memunculkan foto --}}
                                    <td><img src="{{ asset('storage/' . $item->foto) }}" alt="" width="100px"
                                            height="100px">
                                    </td>
                                    {{-- untuk memunculkan data array harga menu --}}
                                    <td>{{ $item['harga'] }}</td>
                                    {{-- untuk memunculkan data array nama kategori --}}
                                    <td>{{ $item->kategori->namaKategori }}</td>
                                    {{-- untuk memunculkan data array keterangan  --}}
                                    <td>{{ $item['keterangan'] }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                {{-- untuk mengedit data menu sesuai pilihan --}}
                                                <a class="dropdown-item" href="{{ route('menu.edit', $item->id) }}"><i
                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                {{-- untuk menghapus data menu sesuai pilihan --}}
                                                <a class="dropdown-item" href="{{ route('deletemenu', $item->id) }}"><i
                                                        class="bx bx-trash me-1"></i>
                                                    Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

            <hr class="my-5" />
            <!--/ Responsive Table -->
        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
