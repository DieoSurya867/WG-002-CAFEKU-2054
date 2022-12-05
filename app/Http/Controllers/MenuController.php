<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan dashboard admin Menu
        $menu = Menu::all();
        return view('pages.admin.artikel', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Menampilkan Dashboard Admin Menu Tambah Data
        $kategori = Kategori::all();
        return view('pages.admin.artikel.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk membuat data di table menus
        $validator = $request->validate([
            'namaArtikel' => 'required|string',
            'foto' => 'required|image|max:10000|mimes:png,jpg',
            'harga' => 'required|integer',
            'keterangan' => 'required|string',
            'kategori_id' => 'required',
        ]);
        $file = $request->file('foto')->store('artikel');
        $validator['foto'] = $file;
        Menu::create($validator);

        return redirect('admin/menu');
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
        //untuk mengedit data sesuai id pilihan di tampilan dashboard menu edit
        $menu = Menu::findOrFail($id);
        $kategori = Kategori::all();
        return view('pages.admin.artikel.edit', [
            'menu' => $menu,
            'kategori' => $kategori,
        ]);
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
        //untuk mengupdate data sesuai id pilihan
        $menu = Menu::findOrFail($id);
        $validator = $request->validate([
            'namaArtikel' => 'required|string',
            'harga' => 'required|integer',
            'keterangan' => 'required|string',
            'kategori_id' => 'required',
        ]);
        $menu->update($validator);
        $dataLama = Menu::where('id', $id)->first();

        if ($request->file('foto')) {
            $foto1 = public_path('storage/' . $dataLama->foto);
            if (File::exists($foto1)) {
                File::delete($foto1);
            }
            $file = $request->file('foto')->store('artikel');
            $menu->update([
                'foto' => $file,
            ]);
            return redirect('admin/menu');
        }
        return redirect('admin/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //untuk menghapus data di table dan foto di direktori projek
        $dataLama = Menu::where('id', $id)->first();
        $foto1 = public_path('storage/' . $dataLama->foto);
        if (File::exists($foto1)) {
            File::delete($foto1);
        }
        Menu::where('id', $id)->delete();
        return redirect('admin/menu');
    }
}
