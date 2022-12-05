@extends('layouts.perpus')

@section('content')
    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>Cafeku</h3>
                <p>
                    Cafe Pilihan Para Petuah Adat
                </p>

            </div>
        </div>
    </section>

    <section class="blogs" id="blogs">
        <h1 class="heading"><span>our blogs</span></h1>

        <div class="swiper blogs-slider">
            <div class="swiper-wrapper">

                @forelse($menu as $item)
                    <div class="swiper-slide box">
                        <div class="image">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="" />
                        </div>
                        <div class="content">
                            <center>
                                <h3 class="text-center">{{ $item->namaArtikel }}</h3>

                                <h4>{{ $item->harga }}</h4>
                            </center>
                            <p>
                                {{ $item->keterangan }}
                            </p>
                            <a href="#" class="btn">read more</a>
                        </div>
                    </div>
                @empty
                    <div class="col-3 mb-5">
                        <h5>Menu Sedang Kosong</h5>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
@endsection
