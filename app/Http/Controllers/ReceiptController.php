<?php

namespace App\Http\Controllers;
//use PDF;
use PDF;
use App\Models\Receipt;
use App\Models\Sale;
use App\Models\Produk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Receipt::all();

        return view('receipt.receipt-list', compact('data'));
    }

    public function receipt_detail($id)
    {
        $data = Receipt::where('id', $id)->first();
        $produk_data = Sale::where('receipt_id', $id)->get();
        $total_harga_keseluruhan = $produk_data->sum('total_harga');
        // dd($data);
        return view('receipt.receipt-detail', compact('data', 'produk_data', 'total_harga_keseluruhan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        $data = [
            'nama_pembeli' => 'required'
        ];

        $validate = $request->validate($data);
        $total_harga = Sale::where('status', 'Undone')->sum('total_harga');
        $nama_pembeli = $request->nama_pembeli;
;
        Receipt::where('id', $id)->update([
            'nama_pembeli' => $nama_pembeli,
            'total_harga' => $total_harga,
            'status' => 'Done'
        ]);

        Sale::where('receipt_id', $id)->update([
            'status' => 'Done'
        ]);


        // Mengurangi stok produk
        $test = Sale::where('receipt_id', $id)->get();

        foreach ($test as $t)
        {
            $value = Produk::where('id', $t->produk_id)->get();
            foreach ($value as $v) {
                $hasil = $v->stok_produk - $t->quantity_produk;

                Produk::where('id', $t->produk_id)->update([
                    'stok_produk' => $hasil
                ]);
                echo $hasil;
            }
        }
        //

        Alert::toast('Berhasil menambahkan barang!', 'success');
        return redirect()->route('receipt-detail', $id);
    }

    public function cetak_receipt($id)
    {
    	$data = Receipt::where('id', $id)->first();
        $produk_data = Sale::where('receipt_id', $id)->get();
        $total_harga_keseluruhan = $produk_data->sum('total_harga');

    	$pdf = PDF::loadview('receipt.receipt-pdf', compact('data', 'produk_data', 'total_harga_keseluruhan'));
        // return view('receipt-pdf', compact('data', 'produk_data', 'total_harga_keseluruhan'));
        // return $pdf->stream();
    	return $pdf->download('receipt.pdf');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Receipt $receipt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Receipt $receipt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receipt $receipt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //get post by ID
        $item = Receipt::findOrFail($id);

        //delete post
        $item->delete();

        //redirect to checkout
        Alert::success('Berhasil', 'Berhasil menghapus');
        return redirect()->route('checkout');
    }
}
