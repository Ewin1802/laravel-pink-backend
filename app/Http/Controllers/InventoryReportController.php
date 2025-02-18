<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Inventory;
use App\Models\Inventory_out;

class InventoryReportController extends Controller
{
    // public function index(Request $request)
    // {
    //     // Ambil input tanggal dari request atau default ke bulan ini
    //     $start_date = $request->input('start_date', Carbon::now()->startOfMonth()->toDateString());
    //     $end_date = $request->input('end_date', Carbon::now()->endOfMonth()->toDateString());

    //     // Validasi tanggal
    //     if ($start_date > $end_date) {
    //         return redirect()->back()->with('error', 'Tanggal mulai tidak bisa lebih besar dari tanggal akhir.');
    //     }

    //     // Konversi ke format waktu penuh
    //     $startDateTime = Carbon::parse($start_date)->startOfDay();
    //     $endDateTime = Carbon::parse($end_date)->endOfDay();

    //     // Query untuk laporan persediaan
    //     $inventoryReport = Inventory::select(
    //         'inventories.id',
    //         'inventories.bahan_id',
    //         'inventories.satuan',
    //         'inventories.amount as harga_satuan',
    //         DB::raw('SUM(inventories.saldo_awal) as saldo_awal'),
    //         DB::raw('SUM(inventories.quantity) as sisa_stok') // Ambil Sisa Stok dari Inventory
    //     )
    //     ->whereBetween('inventories.created_at', [$startDateTime, $endDateTime])
    //     ->groupBy('inventories.id', 'inventories.bahan_id', 'inventories.satuan', 'inventories.amount')
    //     ->with([
    //         'bahan', // Relasi ke tabel bahan untuk mengambil nama bahan
    //         'inventoryOut' => function ($query) use ($startDateTime, $endDateTime) {
    //             $query->whereBetween('created_at', [$startDateTime, $endDateTime]);
    //         }
    //     ])
    //     ->paginate(10);

    //     return view('pages.inventory_reports.index', compact('inventoryReport', 'start_date', 'end_date'));
    // }

    public function index(Request $request)
    {
        $start_date = $request->input('start_date', Carbon::now()->startOfMonth()->toDateString());
        $end_date = $request->input('end_date', Carbon::now()->endOfMonth()->toDateString());

        // Validasi tanggal
        if ($start_date > $end_date) {
            return redirect()->back()->with('error', 'Tanggal mulai tidak bisa lebih besar dari tanggal akhir.');
        }

        // Konversi ke format waktu penuh
        $startDateTime = Carbon::parse($start_date)->startOfDay();
        $endDateTime = Carbon::parse($end_date)->endOfDay();

        // Query laporan persediaan berdasarkan tanggal_masuk
        $inventoryReport = Inventory::select(
            'inventories.id',
            'inventories.bahan_id',
            'inventories.satuan',
            'inventories.tanggal_masuk', // Tambahkan tanggal masuk
            'inventories.amount as harga_satuan',
            DB::raw('SUM(inventories.saldo_awal) as saldo_awal'),
            DB::raw('SUM(inventories.quantity) as sisa_stok')
        )
        ->whereBetween('inventories.tanggal_masuk', [$startDateTime, $endDateTime]) // Menggunakan tanggal_masuk
        ->groupBy('inventories.id', 'inventories.bahan_id', 'inventories.satuan', 'inventories.amount')
        ->with([
            'bahan',
            'inventoryOut' => function ($query) use ($startDateTime, $endDateTime) {
                $query->whereBetween('created_at', [$startDateTime, $endDateTime])
                      ->select('inventory_outs.*', 'inventory_outs.receiver'); // Tambahkan receiver
            }
        ])
        ->paginate(10);

        return view('pages.inventory_reports.index', compact('inventoryReport', 'start_date', 'end_date'));
    }


}
