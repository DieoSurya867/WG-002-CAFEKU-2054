<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pesanan = explode(',', $request->pesanan);
        $status = $request->status;
        $jumlahPesanan = count($pesanan);
        $totalPesanan = $jumlahPesanan * 50000;
        $pesan = new Pembayaran($status, $totalPesanan);
        $bayar = $pesan->bayar();
        $data = [
            'namaOrang' => $request->namaOrang,
            'jumlahPesanan' => $jumlahPesanan,
            'totalPesanan' => $totalPesanan,
            'status' => $status,
            'diskon' => $pesan->diskon($status, $totalPesanan),
            'totalPembayaran' => $bayar
        ];
        return view('pages.admin.dashboard', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

interface Pesan
{
    public function diskon();
}

abstract class parentOrder implements Pesan
{
    public $status;
    public $totalPesanan;

    public function __construct($status, $totalPesanan)
    {
        $this->status = $status;
        $this->totalPesanan = $totalPesanan;
    }

    public function diskon()
    {
        if ($this->status == 'member' && $this->totalPesanan < 100000) {
            return $this->totalPesanan * (10 / 100);
        } elseif ($this->status == 'member' && $this->totalPesanan >= 100000) {
            return $this->totalPesanan * (20 / 100);
        } else {
            return $this->totalPesanan * (0 / 100);
        }
    }

    abstract public function bayar(): string;
}

class Pembayaran extends parentOrder
{
    public function bayar(): string
    {
        return (int)$this->totalPesanan - (int)$this->diskon($this->status, $this->totalPesanan);
    }
}
