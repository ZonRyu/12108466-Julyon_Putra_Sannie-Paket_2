<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ProdukController extends Controller
{
    // Halaman Produk list
    public function index()
    {
        $data = Produk::all();
        return view('produk.produk-list', compact('data'));
    }

    // Halaman Produk edit
    public function index_edit($id)
    {
        $data = Produk::where('id', $id)->first();
        return view('produk.produk-edit', compact('data'));
    }

    // Halaman Produk add
    public function index_add()
    {
        return view('produk.produk-add');
    }

    // Membuat Produk
    public function create(Request $request)
    {
        //dd($request);
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'stok_produk' => 'required',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if (Produk::where('nama_produk', $request->nama_produk)->exists()){
            Alert::error('Error', 'Produk sudah ada');
            return redirect()->route('produk-list');
        }else{
            $foto = $request->foto_produk->getClientOriginalName();
            $request->foto_produk->move(public_path('foto_produk'), $foto);
    
            $data = Produk::create([
                'nama_produk' => $request->nama_produk,
                'harga_produk' => $request->harga_produk,
                'stok_produk' => $request->stok_produk,
                'foto_produk' => $foto,
            ]);
    
            Alert::success('Success', 'Data berhasil ditambahkan');
            return redirect()->route('produk-list');
        }
    }

    // Export data ke excel
    public function export_excel()
    {
        return Excel::download(new ProdukExport, 'siswa.xlsx');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk)
    {
        //
    }

    // Mengedit Produk
    public function update(Request $request, Produk $produk, $id)
    {
        $request->validate([
            'foto_produk' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = Produk::find($id);

        $data->update([
            'nama_produk' => $request->nama_produk,
            'harga_produk' => $request->harga_produk,
            'stok_produk' => $request->stok_produk,
        ]);

        if($request->foto_produk != ''){
            $path = public_path().'/foto_produk/';

            //code for remove old file
            if($data->foto_produk != ''  && $data->foto_produk != null){
                 $file_old = $path.$data->foto_produk;
                 unlink($file_old);
            }

            //upload new file
            $file = $request->foto_produk;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);

            //for update in table
            $data->update(['foto_produk' => $filename]);
       }

        Alert::success('Success', 'Data berhasil diubah');
        return redirect()->route('produk-list');
    }

    // Menghapus Produk
    public function destroy(Produk $produk, $id)
    {
        $data = Produk::find($id);
        $data->delete();

        Alert::success('Success', 'Data berhasil dihapus');
        return redirect()->route('produk-list');
    }
}
