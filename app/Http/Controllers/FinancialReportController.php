<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Order;
use Carbon\Carbon;

class FinancialReportController extends Controller
{

    // public function index(Request $request)
    // {
    //     // Gunakan Carbon dengan namespace yang benar

    //     $startDate = Carbon::parse($request->input('start_date', Carbon::now()->startOfMonth()->toDateString()))->startOfDay();
    //     $endDate = Carbon::parse($request->input('end_date', Carbon::now()->endOfMonth()->toDateString()))->endOfDay();

    //     // dd($startDate, $endDate);

    //     // Ambil data persediaan
    //     $inventoryQuery = Inventory::whereBetween('created_at', [$startDate, $endDate])->get();

    //     // Hitung total persediaan
    //     $totalPersediaan = $inventoryQuery->sum(fn ($item) => (float) $item->saldo_awal * (float) $item->amount);

    //     // Ambil data order
    //     // $orders = Order::whereBetween('created_at', [$startDate, $endDate])->get();
    //     $orders = Order::whereDate('created_at', '>=', $startDate->toDateString())
    //            ->whereDate('created_at', '<=', $endDate->toDateString())
    //            ->get();

    //     // Hitung total keuangan
    //     $totalKeuangan = (float) $orders->sum('sub_total')
    //                     - (float) $orders->sum('discount_amount')
    //                     - (float) $orders->sum('tax')
    //                     + (float) $orders->sum('service_charge');

    //     return view('pages.financial.index', compact('startDate', 'endDate', 'totalPersediaan', 'totalKeuangan'));
    // }

    public function index(Request $request)
    {
        $startDate = Carbon::parse($request->input('start_date', Carbon::now()->startOfMonth()->toDateString()))->startOfDay();
        $endDate = Carbon::parse($request->input('end_date', Carbon::now()->endOfMonth()->toDateString()))->endOfDay();

        // Ambil data persediaan
        $inventoryQuery = Inventory::whereBetween('created_at', [$startDate, $endDate])->get();
        $totalPersediaan = $inventoryQuery->sum(fn ($item) => (float) $item->saldo_awal * (float) $item->amount);

        // Ambil data order
        $orders = Order::whereBetween('created_at', [$startDate, $endDate])->get();
        $totalKeuangan = (float) ($orders->sum('sub_total') ?? 0)
                        - (float) ($orders->sum('discount_amount') ?? 0)
                        - (float) ($orders->sum('tax') ?? 0)
                        + (float) ($orders->sum('service_charge') ?? 0);

        // Kirim data ke view
        return view('pages.financial.index', compact('startDate', 'endDate', 'totalPersediaan', 'totalKeuangan'));
    }


}
