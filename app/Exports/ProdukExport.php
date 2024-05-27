<?php

namespace App\Exports;

use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProdukExport implements FromCollection,WithHeadings
{
    private $produk;

    public function __construct($produk)
    {
        $this->produk = $produk;
    }

    /**
     * @return View
     */
    public function collection()
    {
        $produkData = Produk::all();
        return $this->produk;
        // return view('produk.produk-list', ['produk' => $produkData]);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getDelegate()->setRightToLeft(true);
            },
        ];
    }

    public function headings(): array
    {
        return ["id", "nama_produk", "harga_produk", "stok_produk", "foto_produk", "created_at", "updated_at"];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
}
