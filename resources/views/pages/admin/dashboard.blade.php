@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / </span>Dashboard </h4>

        <!-- Form controls -->
        <div class="row">


            <div class="col-md-6">
                <div class="card mb-4">
                    <h5 class="card-header">Tampilan Hitung Orderan</h5>
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">

                                    <form action="{{ route('dashboard.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Nama Orang</label>
                                            <input type="text" class="form-control" name="namaOrang">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah Pesanan</label>
                                            <input type="number" class="form-control" name="jumlah">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1" class="form-label">Pilih Status
                                                Pembeli</label>
                                            <select class="form-select @error('status') is-invalid @enderror"
                                                id="exampleFormControlSelect1" aria-label="Default select example"
                                                name="status">
                                                <option selected>Pilihan Status</option>
                                                <option value="member">
                                                    Member</option>
                                                <option value="tidak">
                                                    Bukan</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>

                                    <table class="table mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Total Pesanan</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Diskon</th>
                                                <th scope="col">Total Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @isset($data)
                                                    <td>{{ $data['namaOrang'] }}</td>
                                                    <td>{{ $data['totalPesanan'] }}</td>
                                                    <td>{{ $data['status'] }}</td>
                                                    <td>{{ $data['diskon'] }}</td>
                                                    <td>{{ $data['totalPembayaran'] }}</td>
                                                @endisset
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
